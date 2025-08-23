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
    private const VALID_CATEGORIES = [
        'kemensekab',
        'kemenagrarialh', 
        'kemenrisma',
        'kemensospol',
        'kemenhadkesma',
        'kemendaniv',
        'kemenpp',
        'kemenkesra',
        'kemenekraf',
        'kemenkominfo',
        'kemenluniv',
        'kemensosmas',
        'kemenkeu'
    ];

    public function index(Request $request)
    {
        $query = News::query();
        
        if ($request->has('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }
        
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }
        
        $news = $query->latest()->paginate(10);
        
        return response()->json($news);
    }

    public function store(Request $request)
    {
        Log::info('=== ENHANCED NEWS UPLOAD DEBUG START ===');
        Log::info('Request Method: ' . $request->method());
        Log::info('Content-Type: ' . $request->header('Content-Type'));
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('Raw Request Data:', $request->all());
        Log::info('Request Files:', $request->allFiles());
        
        // Log each field individually
        $fields = ['title', 'excerpt', 'content', 'category', 'author', 'tags', 'is_published'];
        foreach ($fields as $field) {
            $value = $request->get($field);
            Log::info("Field '{$field}':", [
                'value' => $value,
                'type' => gettype($value),
                'length' => is_string($value) ? strlen($value) : 'n/a',
                'empty' => empty($value) ? 'YES' : 'NO'
            ]);
        }

        // Log category validation specifically
        $category = $request->get('category');
        Log::info('Category validation check:', [
            'received_category' => $category,
            'valid_categories' => self::VALID_CATEGORIES,
            'is_valid' => in_array($category, self::VALID_CATEGORIES) ? 'YES' : 'NO'
        ]);

        try {
            // Pre-process the data
            $requestData = $request->all();
            
            // Handle boolean conversion for is_published
            if (isset($requestData['is_published'])) {
                $original = $requestData['is_published'];
                $requestData['is_published'] = filter_var($original, FILTER_VALIDATE_BOOLEAN);
                Log::info('Boolean conversion:', [
                    'original' => $original,
                    'converted' => $requestData['is_published'],
                    'type_before' => gettype($original),
                    'type_after' => gettype($requestData['is_published'])
                ]);
            }

            // Validate step by step
            $rules = [
                'title' => 'required|string|max:255',
                'excerpt' => 'required|string|max:500', 
                'content' => 'required|string',
                'category' => 'required|in:' . implode(',', self::VALID_CATEGORIES),
                'author' => 'required|string|max:100',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tags' => 'nullable|string',
                'is_published' => 'nullable|boolean',
                'published_at' => 'nullable|date'
            ];

            Log::info('Validation rules:', $rules);

            // Create new request instance with processed data
            $newRequest = new Request($requestData);
            if ($request->hasFile('image')) {
                $newRequest->files->set('image', $request->file('image'));
            }

            $validated = $newRequest->validate($rules);
            
            Log::info('✅ Validation PASSED');
            Log::info('Validated data:', $validated);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('❌ VALIDATION FAILED');
            Log::error('Validation errors:', $e->errors());
            Log::error('Failed rules:', $e->validator->failed());
            
            // Return detailed error for debugging
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
                'failed_rules' => $e->validator->failed(),
                'request_data' => $request->all(),
                'debug_info' => [
                    'content_type' => $request->header('Content-Type'),
                    'method' => $request->method(),
                    'has_files' => $request->hasFile('image'),
                    'category_received' => $request->get('category'),
                    'valid_categories' => self::VALID_CATEGORIES
                ]
            ], 422);
        } catch (\Exception $e) {
            Log::error('❌ GENERAL VALIDATION ERROR');
            Log::error('Error message: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'error' => 'Validation error: ' . $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                Log::info('🖼️ Processing image upload...');
                
                $file = $request->file('image');
                Log::info('Image file details:', [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType(),
                    'valid' => $file->isValid()
                ]);
                
                $imagePath = $file->store('news', 'public');
                $validated['image'] = $imagePath;
                
                Log::info('✅ Image uploaded successfully: ' . $imagePath);
                
            } catch (\Exception $e) {
                Log::error('❌ Image upload failed: ' . $e->getMessage());
                return response()->json([
                    'error' => 'Image upload failed: ' . $e->getMessage()
                ], 500);
            }
        } else {
            Log::info('ℹ️ No image file to upload');
            $validated['image'] = null;
        }

        // Prepare final data
        $newsData = [
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'author' => $validated['author'],
            'image' => $validated['image'],
            'views' => 0,
            'tags' => !empty($validated['tags']) ? 
                array_map('trim', explode(',', $validated['tags'])) : [],
            'is_published' => (bool) ($validated['is_published'] ?? false),
            'published_at' => ($validated['is_published'] ?? false) ? 
                ($validated['published_at'] ?? now()) : null
        ];

        Log::info('💾 Final data for database:', $newsData);

        try {
            $news = News::create($newsData);
            
            Log::info('✅ News created successfully');
            Log::info('Created news data:', $news->toArray());
            Log::info('=== NEWS UPLOAD DEBUG END ===');
            
            return response()->json([
                'message' => 'Berita berhasil dibuat',
                'data' => $news
            ], 201);
            
        } catch (\Exception $e) {
            Log::error('❌ Database save failed');
            Log::error('Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'error' => 'Database save failed: ' . $e->getMessage(),
                'debug_data' => $newsData
            ], 500);
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
            'category' => 'required|in:' . implode(',', self::VALID_CATEGORIES),
            'author' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

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
            'by_category' => []
        ];

        foreach (self::VALID_CATEGORIES as $category) {
            $stats['by_category'][$category] = News::byCategory($category)->count();
        }

        return response()->json($stats);
    }
}