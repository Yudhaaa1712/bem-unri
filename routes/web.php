<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentInfoController;

// Main pages


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/kemendagri', function () {
    return view('kemendagri');
})->name('kemendagri');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/student-info', function () {
    return view('student-info');
})->name('student.info');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// API Routes for Vue.js components
Route::prefix('api')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('api.news');
    Route::get('/news/{category}', [NewsController::class, 'byCategory'])->name('api.news.category');
    Route::get('/student-info', [StudentInfoController::class, 'index'])->name('api.student.info');
});

