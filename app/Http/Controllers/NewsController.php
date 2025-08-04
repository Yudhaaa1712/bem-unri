<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
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

        return response()->json($news);
    }

    public function byCategory($category)
    {
        $news = News::published()
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
                    
        return response()->json($news);
    }

    public function show($id)
    {
        $news = News::published()->find($id);
        
        if (!$news) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        // Increment views ketika berita dibaca
        $news->incrementViews();

        return response()->json([
            'id' => $news->id,
            'title' => $news->title,
            'excerpt' => $news->excerpt,
            'content' => $news->content,
            'category' => $news->category,
            'author' => $news->author,
            'image' => $news->image,
            'created_at' => $news->formatted_date,
            'views' => $news->views,
            'tags' => $news->tags ?? [],
            'is_published' => $news->is_published
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $category = $request->get('category', 'all');
        
        $newsQuery = News::published();
        
        if ($category !== 'all') {
            $newsQuery->byCategory($category);
        }
        
        if (!empty($query)) {
            $newsQuery->search($query);
        }
        
        $news = $newsQuery->latest('published_at')
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
        
        return response()->json($news);
    }
}