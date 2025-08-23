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
        Route::get('/', [EventController::class, 'index'])->name('api.events');
        Route::get('/{id}', [EventController::class, 'show'])->name('api.events.show');
    });
    
    // Photos API (Public - untuk frontend Gallery)
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('api.photos');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (GUEST ONLY)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Routes untuk guest (belum login) dengan middleware guest untuk admin
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    });
    
    // Logout route (butuh auth)
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->middleware('admin.auth')
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (DENGAN MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // News management
    Route::get('/news', function () {
        return view('admin.news.index');
    })->name('news.index');
    
    // Events management
    Route::get('/events', function () {
        return view('admin.events.index');
    })->name('events.index');
    
    // Photos management
    Route::get('/photos', function () {
        return view('admin.photos.index');
    })->name('photos.index');
    
    // Settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});

/*
|--------------------------------------------------------------------------
| Admin API Routes (DENGAN MIDDLEWARE)
|--------------------------------------------------------------------------
*/

Route::prefix('api/admin')->name('admin.api.')->middleware('admin.auth')->group(function () {
    // News API
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/stats', [AdminNewsController::class, 'stats'])->name('stats');
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::post('/', [AdminNewsController::class, 'store'])->name('store');
        Route::get('/{news}', [AdminNewsController::class, 'show'])->name('show');
        Route::put('/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');
        Route::post('/{news}/toggle-publish', [AdminNewsController::class, 'togglePublish'])->name('toggle');
        Route::post('/bulk-delete', [AdminNewsController::class, 'bulkDelete'])->name('bulk-delete');
    });
    
    // Events API
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'adminIndex'])->name('index');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::get('/{id}', [EventController::class, 'show'])->name('show');
        Route::put('/{id}', [EventController::class, 'update'])->name('update');
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('destroy');
    });
    
    // Photos API
    Route::prefix('photos')->name('photos.')->group(function () {
        Route::get('/', [PhotoController::class, 'adminIndex'])->name('index');
        Route::post('/', [PhotoController::class, 'store'])->name('store');
        Route::put('/{id}', [PhotoController::class, 'update'])->name('update');
        Route::delete('/{id}', [PhotoController::class, 'destroy'])->name('destroy');
    });
});

// Redirect admin root ke dashboard (dengan auth check)
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware('admin.auth');