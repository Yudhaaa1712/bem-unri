<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

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
Route::get('/kemensekab', function () {
    return view('kemensekab');
})->name('kemensekab');

Route::get('/kemensosmas', function () {
    return view('kemensosmas');
})->name('kemensosmas');

Route::get('/kemenagrarialh', function () {
    return view('kemenagrarialh');
})->name('kemenagrarialh');

Route::get('/kemendaniv', function () {
    return view('kemendaniv');
})->name('kemendaniv');

Route::get('/kemenekraf', function () {
    return view('kemenekraf');
})->name('kemenekraf');

Route::get('/kemenhadkesma', function () {
    return view('kemenhadkesma');
})->name('kemenhadkesma');

Route::get('/kemenkesra', function () {
    return view('kemenkesra');
})->name('kemenkesra');

Route::get('/kemenkeu', function () {
    return view('kemenkeu');
})->name('kemenkeu');

Route::get('/kemenkominfo', function () {
    return view('kemenkominfo');
})->name('kemenkominfo');

Route::get('/kemenluniv', function () {
    return view('kemenluniv');
})->name('kemenluniv');

Route::get('/kemenpp', function () {
    return view('kemenpp');
})->name('kemenpp');

Route::get('/kemenrisma', function () {
    return view('kemenrisma');
})->name('kemenrisma');

Route::get('/kemensospol', function () {
    return view('kemensospol');
})->name('kemensospol');



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
    
    // Events API (Public - untuk frontend Timeline)
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('api.events'); // GET /api/events
        Route::get('/{id}', [EventController::class, 'show'])->name('api.events.show'); // GET /api/events/1
    });
    
    // Photos API (Public - untuk frontend Gallery)
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('api.photos'); // GET /api/photos
    });
});

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (NO MIDDLEWARE)
|--------------------------------------------------------------------------
*/

// Login routes (tidak butuh middleware)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (sementara tanpa middleware untuk testing)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // News management
    Route::get('/news', function () {
        return view('admin.news.index');
    })->name('admin.news.index');
    
    // Events management (halaman admin untuk kelola events)
    Route::get('/events', function () {
        return view('admin.events.index');
    })->name('admin.events.index');
});

/*
|--------------------------------------------------------------------------
| Admin API Routes (sementara tanpa middleware untuk testing)
|--------------------------------------------------------------------------
*/

Route::prefix('api/admin')->group(function () {
    // News API
    Route::middleware('admin.auth')->group(function () {
        Route::get('/news/stats', [AdminNewsController::class, 'stats'])->name('admin.api.news.stats');
        Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.api.news.index');
        Route::post('/news', [AdminNewsController::class, 'store'])->name('admin.api.news.store');
        Route::get('/news/{news}', [AdminNewsController::class, 'show'])->name('admin.api.news.show');
        Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('admin.api.news.update');
        Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.api.news.destroy');
        Route::post('/news/{news}/toggle-publish', [AdminNewsController::class, 'togglePublish'])->name('admin.api.news.toggle');
        Route::post('/news/bulk-delete', [AdminNewsController::class, 'bulkDelete'])->name('admin.api.news.bulk-delete');
    });
    
    // Events API (sementara tanpa middleware untuk testing)
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'adminIndex'])->name('admin.api.events.index'); // GET /api/admin/events
        Route::post('/', [EventController::class, 'store'])->name('admin.api.events.store'); // POST /api/admin/events
        Route::get('/{id}', [EventController::class, 'show'])->name('admin.api.events.show'); // GET /api/admin/events/1
        Route::put('/{id}', [EventController::class, 'update'])->name('admin.api.events.update'); // PUT /api/admin/events/1
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('admin.api.events.destroy'); // DELETE /api/admin/events/1
    });
    
    // Photos API (Admin - untuk CRUD photos)
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'adminIndex'])->name('admin.api.photos.index'); // GET /api/admin/photos
        Route::post('/', [PhotoController::class, 'store'])->name('admin.api.photos.store'); // POST /api/admin/photos
        Route::put('/{id}', [PhotoController::class, 'update'])->name('admin.api.photos.update'); // PUT /api/admin/photos/1
        Route::delete('/{id}', [PhotoController::class, 'destroy'])->name('admin.api.photos.destroy'); // DELETE /api/admin/photos/1
    });
});