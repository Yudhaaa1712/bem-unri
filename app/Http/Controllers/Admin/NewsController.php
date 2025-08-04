<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();
        
        // Filter berdasarkan status
        if ($request->has('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }
        
        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        // Search
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }
        
        $news = $query->latest()->paginate(10);
        
        return response()->json($news);
    }

    public function store(Request $request)
    {
        // === LOGGING UNTUK DEBUG ===
        Log::info('=== NEWS UPLOAD DEBUG START ===');
        Log::info('Request Content-Type: ' . $request->header('Content-Type'));
        Log::info('Request Method: ' . $request->method());
        Log::info('All Request Data:', $request->all());
        Log::info('Has Image File: ' . ($request->hasFile('image') ? 'YES' : 'NO'));
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            Log::info('Image File Details:', [
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'temp_path' => $file->getPathname(),
                'extension' => $file->getClientOriginalExtension(),
                'is_valid' => $file->isValid()
            ]);
        }
        
        // === FIX: Convert string boolean to actual boolean ===
        if ($request->has('is_published')) {
            $request->merge([
                'is_published' => filter_var($request->is_published, FILTER_VALIDATE_BOOLEAN)
            ]);
        }
        
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'required|string|max:500',
                'content' => 'required|string',
                'category' => 'required|in:kemendagri,kemlu,sosmas',
                'author' => 'required|string|max:100',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tags' => 'nullable|string',
                'is_published' => 'boolean',
                'published_at' => 'nullable|date'
            ]);
            
            Log::info('Validation Passed');
            
        } catch (\Exception $e) {
            Log::error('Validation Failed: ' . $e->getMessage());
            return response()->json(['error' => 'Validation failed: ' . $e->getMessage()], 422);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                Log::info('Starting image upload...');
                
                // Cek folder exists
                $storagePath = storage_path('app/public/news');
                if (!is_dir($storagePath)) {
                    Log::info('Creating news directory...');
                    mkdir($storagePath, 0755, true);
                }
                
                $imagePath = $request->file('image')->store('news', 'public');
                $validated['image'] = $imagePath;
                
                Log::info('Image upload SUCCESS:', [
                    'path' => $imagePath,
                    'full_path' => storage_path('app/public/' . $imagePath),
                    'file_exists' => file_exists(storage_path('app/public/' . $imagePath)),
                    'public_url' => url('/storage/' . $imagePath)
                ]);
                
            } catch (\Exception $e) {
                Log::error('Image upload FAILED: ' . $e->getMessage());
                return response()->json(['error' => 'Image upload failed: ' . $e->getMessage()], 500);
            }
        } else {
            Log::info('No image file to upload');
        }

        // Process tags
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        // Set published_at if publishing
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        try {
            $news = News::create($validated);
            Log::info('News created successfully:', [
                'id' => $news->id,
                'title' => $news->title,
                'image' => $news->image
            ]);
            
            Log::info('=== NEWS UPLOAD DEBUG END ===');
            
            return response()->json([
                'message' => 'Berita berhasil dibuat',
                'data' => $news
            ], 201);
            
        } catch (\Exception $e) {
            Log::error('Database save FAILED: ' . $e->getMessage());
            return response()->json(['error' => 'Database save failed: ' . $e->getMessage()], 500);
        }
    }

    public function show(News $news)
    {
        return response()->json($news);
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|in:kemendagri,kemlu,sosmas',
            'author' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            
            $imagePath = $request->file('image')->store('news', 'public');
            $validated['image'] = $imagePath;
        }

        // Process tags
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        // Set published_at if publishing for the first time
        if ($validated['is_published'] && !$news->is_published && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $news->update($validated);

        return response()->json([
            'message' => 'Berita berhasil diupdate',
            'data' => $news
        ]);
    }

    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json([
            'message' => 'Berita berhasil dihapus'
        ]);
    }

    public function togglePublish(News $news)
    {
        $news->update([
            'is_published' => !$news->is_published,
            'published_at' => !$news->is_published ? now() : $news->published_at
        ]);

        return response()->json([
            'message' => $news->is_published ? 'Berita berhasil dipublish' : 'Berita berhasil di-unpublish',
            'data' => $news
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:news,id'
        ]);

        $newsItems = News::whereIn('id', $validated['ids'])->get();

        foreach ($newsItems as $news) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->delete();
        }

        return response()->json([
            'message' => 'Berita berhasil dihapus'
        ]);
    }

    public function stats()
    {
        $stats = [
            'total' => News::count(),
            'published' => News::where('is_published', true)->count(),
            'draft' => News::where('is_published', false)->count(),
            'total_views' => News::sum('views'),
            'by_category' => [
                'kemendagri' => News::byCategory('kemendagri')->count(),
                'kemlu' => News::byCategory('kemlu')->count(),
                'sosmas' => News::byCategory('sosmas')->count(),
            ]
        ];

        return response()->json($stats);
    }
}