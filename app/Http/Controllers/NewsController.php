<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Dummy data untuk sekarang - nanti bisa diganti dengan data dari database
        $news = [
            [
                'id' => 1,
                'title' => 'Workshop Pengembangan Organisasi Mahasiswa',
                'excerpt' => 'BEM UNRI mengadakan workshop pengembangan organisasi mahasiswa yang diikuti oleh seluruh pengurus organisasi di lingkungan Universitas Riau...',
                'content' => 'Content lengkap berita...',
                'category' => 'kemendagri',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => now()->subDays(2),
                'is_published' => true
            ],
            [
                'id' => 2,
                'title' => 'Kerjasama Internasional dengan Universitas Malaysia',
                'excerpt' => 'BEM UNRI menjalin kerjasama dengan organisasi mahasiswa dari Universitas Malaysia dalam program pertukaran budaya dan akademik...',
                'content' => 'Content lengkap berita...',
                'category' => 'kemlu',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => now()->subDays(5),
                'is_published' => true
            ],
            [
                'id' => 3,
                'title' => 'Bakti Sosial di Desa Sungai Pinang',
                'excerpt' => 'Kegiatan bakti sosial yang melibatkan 100 mahasiswa untuk membantu renovasi sekolah dan memberikan bantuan pendidikan...',
                'content' => 'Content lengkap berita...',
                'category' => 'sosmas',
                'author' => 'Admin BEM',
                'image' => null,
                'created_at' => now()->subWeek(),
                'is_published' => true
            ]
        ];
        
        return response()->json($news);
    }

    public function byCategory($category)
    {
        // Filter berita berdasarkan kategori
        $allNews = $this->index()->getData();
        $filteredNews = array_filter($allNews, function($news) use ($category) {
            return $news['category'] === $category;
        });
        
        return response()->json(array_values($filteredNews));
    }
}