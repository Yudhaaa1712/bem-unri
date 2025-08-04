<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes - Public Pages
|--------------------------------------------------------------------------
*/

// Main pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Kementrian pages
Route::get('/kemendagri', function () {
    return view('kemendagri');
})->name('kemendagri');
Route::get('/kemensosmas', function () {
    return view('kemensosmas');
})->name('kemensosmas');

// Menu/navigasi pages
Route::get('/news', function () {
    return view('news');
})->name('news');
Route::get('/student-info', function () {
    return view('student-info');
})->name('student.info');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| API Routes - Public
|--------------------------------------------------------------------------
*/

Route::prefix('api')->group(function () {
    // News API
    Route::get('/news', [NewsController::class, 'index'])->name('api.news');
    Route::get('/news/category/{category}', [NewsController::class, 'byCategory'])->name('api.news.category');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('api.news.show');
    Route::get('/news/search', [NewsController::class, 'search'])->name('api.news.search');
    
    // Student Info API
    Route::get('/student-info', [StudentInfoController::class, 'index'])->name('api.student.info');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Panel Pages
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/news', function () {
        return view('admin.news.index');
    })->name('admin.news.index');
});

// Admin API Routes
Route::prefix('api/admin')->group(function () {
    Route::get('/news/stats', [AdminNewsController::class, 'stats'])->name('admin.api.news.stats');
    Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.api.news.index');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('admin.api.news.store');
    Route::get('/news/{news}', [AdminNewsController::class, 'show'])->name('admin.api.news.show');
    Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('admin.api.news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.api.news.destroy');
    Route::post('/news/{news}/toggle-publish', [AdminNewsController::class, 'togglePublish'])->name('admin.api.news.toggle');
    Route::post('/news/bulk-delete', [AdminNewsController::class, 'bulkDelete'])->name('admin.api.news.bulk-delete');
});