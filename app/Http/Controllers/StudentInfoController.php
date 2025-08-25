<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    public function index()
    {
        $studentInfos = StudentInfo::published()
                    ->latest('published_at')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'title' => $item->title,
                            'excerpt' => $item->excerpt,
                            'content' => $item->content,
                            'category' => $item->category,
                            'author' => $item->author,
                            'image' => $item->image,
                            'created_at' => $item->formatted_date,
                            'views' => $item->views,
                            'tags' => $item->tags ?? [],
                            'is_published' => $item->is_published
                        ];
                    });

        return response()->json($studentInfos);
    }

    public function byCategory($category)
    {
        $studentInfos = StudentInfo::published()
                    ->byCategory($category)
                    ->latest('published_at')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'title' => $item->title,
                            'excerpt' => $item->excerpt,
                            'content' => $item->content,
                            'category' => $item->category,
                            'author' => $item->author,
                            'image' => $item->image,
                            'created_at' => $item->formatted_date,
                            'views' => $item->views,
                            'tags' => $item->tags ?? [],
                            'is_published' => $item->is_published
                        ];
                    });
                    
        return response()->json($studentInfos);
    }

    public function show($id)
    {
        $studentInfo = StudentInfo::published()->find($id);
        
        if (!$studentInfo) {
            return response()->json(['message' => 'Informasi mahasiswa tidak ditemukan'], 404);
        }

        $studentInfo->incrementViews();

        return response()->json([
            'id' => $studentInfo->id,
            'title' => $studentInfo->title,
            'excerpt' => $studentInfo->excerpt,
            'content' => $studentInfo->content,
            'category' => $studentInfo->category,
            'author' => $studentInfo->author,
            'image' => $studentInfo->image,
            'created_at' => $studentInfo->formatted_date,
            'views' => $studentInfo->views,
            'tags' => $studentInfo->tags ?? [],
            'is_published' => $studentInfo->is_published
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $category = $request->get('category', 'all');
        
        $studentInfoQuery = StudentInfo::published();
        
        if ($category !== 'all') {
            $studentInfoQuery->byCategory($category);
        }
        
        if (!empty($query)) {
            $studentInfoQuery->search($query);
        }
        
        $studentInfos = $studentInfoQuery->latest('published_at')
                         ->get()
                         ->map(function ($item) {
                             return [
                                 'id' => $item->id,
                                 'title' => $item->title,
                                 'excerpt' => $item->excerpt,
                                 'content' => $item->content,
                                 'category' => $item->category,
                                 'author' => $item->author,
                                 'image' => $item->image,
                                 'created_at' => $item->formatted_date,
                                 'views' => $item->views,
                                 'tags' => $item->tags ?? [],
                                 'is_published' => $item->is_published
                             ];
                         });
        
        return response()->json($studentInfos);
    }
}