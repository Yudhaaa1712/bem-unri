<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StudentInfoController extends Controller
{
    private const VALID_CATEGORIES = [
        'prestasi',
        'beasiswa',
        'informasi_akademik',
        'kegiatan_mahasiswa',
        'pengumuman'
    ];

    public function index(Request $request)
    {
        $query = StudentInfo::query();
        
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
        
        $studentInfos = $query->latest()->paginate(10);
        
        return response()->json($studentInfos);
    }

    public function store(Request $request)
    {
        Log::info('=== STUDENT INFO STORE DEBUG START ===');
        Log::info('Request Method: ' . $request->method());
        Log::info('Content-Type: ' . $request->header('Content-Type'));
        Log::info('Raw Request Data:', $request->all());

        try {
            // Pre-process the data like in NewsController
            $requestData = $request->all();
            
            // Handle boolean conversion for is_published
            if (isset($requestData['is_published'])) {
                $original = $requestData['is_published'];
                $requestData['is_published'] = filter_var($original, FILTER_VALIDATE_BOOLEAN);
                Log::info('Boolean conversion:', [
                    'original' => $original,
                    'converted' => $requestData['is_published']
                ]);
            }

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

            // Create new request instance with processed data
            $newRequest = new Request($requestData);
            if ($request->hasFile('image')) {
                $newRequest->files->set('image', $request->file('image'));
            }

            $validated = $newRequest->validate($rules);
            
            Log::info('✅ Validation PASSED');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('❌ VALIDATION FAILED');
            Log::error('Validation errors:', $e->errors());
            
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('❌ GENERAL ERROR: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Error: ' . $e->getMessage()
            ], 500);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $validated['image'] = $request->file('image')->store('student-info', 'public');
                Log::info('✅ Image uploaded: ' . $validated['image']);
            } catch (\Exception $e) {
                Log::error('❌ Image upload failed: ' . $e->getMessage());
                return response()->json([
                    'error' => 'Image upload failed: ' . $e->getMessage()
                ], 500);
            }
        } else {
            $validated['image'] = null;
        }

        // Prepare final data
        $studentInfoData = [
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

        Log::info('💾 Final data for database:', $studentInfoData);

        try {
            $studentInfo = StudentInfo::create($studentInfoData);
            
            Log::info('✅ Student info created successfully');
            Log::info('=== STUDENT INFO STORE DEBUG END ===');
            
            return response()->json([
                'message' => 'Informasi mahasiswa berhasil dibuat',
                'data' => $studentInfo
            ], 201);
            
        } catch (\Exception $e) {
            Log::error('❌ Database save failed: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Database save failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(StudentInfo $studentInfo)
    {
        return response()->json($studentInfo);
    }

    public function update(Request $request, StudentInfo $studentInfo)
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
            if ($studentInfo->image) {
                Storage::disk('public')->delete($studentInfo->image);
            }
            $validated['image'] = $request->file('image')->store('student-info', 'public');
        }

        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        if ($validated['is_published'] && !$studentInfo->is_published && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $studentInfo->update($validated);

        return response()->json([
            'message' => 'Informasi mahasiswa berhasil diupdate',
            'data' => $studentInfo
        ]);
    }

    public function destroy(StudentInfo $studentInfo)
    {
        if ($studentInfo->image) {
            Storage::disk('public')->delete($studentInfo->image);
        }

        $studentInfo->delete();

        return response()->json([
            'message' => 'Informasi mahasiswa berhasil dihapus'
        ]);
    }

    public function togglePublish(StudentInfo $studentInfo)
    {
        $studentInfo->update([
            'is_published' => !$studentInfo->is_published,
            'published_at' => !$studentInfo->is_published ? now() : $studentInfo->published_at
        ]);

        return response()->json([
            'message' => $studentInfo->is_published ? 'Informasi mahasiswa berhasil dipublish' : 'Informasi mahasiswa berhasil di-unpublish',
            'data' => $studentInfo
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:student_infos,id'
        ]);

        $studentInfos = StudentInfo::whereIn('id', $validated['ids'])->get();

        foreach ($studentInfos as $studentInfo) {
            if ($studentInfo->image) {
                Storage::disk('public')->delete($studentInfo->image);
            }
            $studentInfo->delete();
        }

        return response()->json([
            'message' => 'Informasi mahasiswa berhasil dihapus'
        ]);
    }

    public function stats()
    {
        $stats = [
            'total' => StudentInfo::count(),
            'published' => StudentInfo::where('is_published', true)->count(),
            'draft' => StudentInfo::where('is_published', false)->count(),
            'total_views' => StudentInfo::sum('views'),
            'by_category' => []
        ];

        foreach (self::VALID_CATEGORIES as $category) {
            $stats['by_category'][$category] = StudentInfo::byCategory($category)->count();
        }

        return response()->json($stats);
    }
}
