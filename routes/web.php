<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/error-permission', function() {
    return view('errors.permission');
})->name('error.permission');

Route::middleware('IsLogin')->group(function() {
    Route::get('/home', function() {
        return view('dashboard.index');
    })->name('home');
});

Route::middleware(['IsLogin', 'IsAdmin'])->group(function() {
        Route::prefix('/rombel')->name('rombel.')->group(function() {
            Route::get('/create', [RombelController::class, 'create'])->name('create');
            Route::post('/store', [RombelController::class, 'store'])->name('store');
            Route::get('/', [RombelController::class, 'index'])->name('home');
            Route::get('/edit/{id}', [RombelController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
            Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
        });
    
        Route::prefix('/rayon')->name('rayon.')->group(function() {
            Route::get('/', [RayonController::class, 'index'])->name('home');
            Route::get('/create', [RayonController::class, 'create'])->name('create');
            Route::post('/store', [RayonController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
            Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');
        });
    
        Route::prefix('/siswa')->name('siswa.')->group(function() {
            Route::get('/', [StudentController::class, 'index'])->name('home');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
        });
    
        Route::prefix('/user')->name('user.')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('home');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    
        Route::prefix('/keterlambatan')->name('keterlambatan.')->group(function() {
            Route::get('/', [LateController::class, 'index'])->name('home');
            Route::get('/create', [LateController::class, 'create'])->name('create');
            Route::post('/store', [LateController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [LateController::class, 'update'])->name('update');
            Route::delete('/{id}', [LateController::class, 'destroy'])->name('delete');
            Route::get('/detail/{id}', [LateController::class, 'show'])->name('detail');
            // Route::get('/search', [LateController::class, 'search'])->name('search');
    
            Route::prefix('/rekapitulasi')->name('rekap.')->group(function() {
                Route::get('/', [LateController::class, 'rekap'])->name('home');
                Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download');
                Route::get('/export-excel', [LateController::class, 'exportExcel'])->name('export-excel');
            });
        });
});

Route::middleware(['IsLogin', 'IsPembimbingSiswa'])->group(function() {
    Route::prefix('/pembimbing-siswa')->name('ps.')->group(function() {
        Route::prefix('/siswa')->name('siswa.')->group(function() {
            Route::get('/', [StudentController::class, 'indexPembimbingSiswa'])->name('home');
        });

        Route::prefix('/keterlambatan')->name('keterlambatan.')->group(function() {
            Route::get('/', [LateController::class, 'indexPembimbingSiswa'])->name('home');
            Route::get('/detail/{id}', [LateController::class, 'show'])->name('detail');
            Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download');
            Route::get('/export-excel', [LateController::class, 'exportExcel'])->name('export-excel');
            Route::get('/search', [LateController::class, 'search'])->name('search');
        });
    });
});

// Route::prefix('/order')->name('order.')->group(function() {
//     Route::get('/data', [OrderController::class, 'data'])->name('data');
//     Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
//     Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
//     Route::get('/search', [OrderController::class, 'searchAdmin'])->name('search');
// });

// Route::middleware(['IsLogin', 'IsAdmin'])->group(function() { 
//     Route::prefix('/rombel')->name('rombel.')->group(function() {
//         Route::get('/create', [RombelController::class, 'create'])->name('create');
//         Route::post('/store', [RombelController::class, 'store'])->name('store');
//         Route::get('/', [RombelController::class, 'index'])->name('home');
//         Route::get('/edit/{id}', [RombelController::class, 'edit'])->name('edit');
//         Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
//         Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
//     });
    
//     Route::prefix('/rayon')->name('rayon.')->group(function() {
//         Route::get('/', [RayonController::class, 'index'])->name('home');
//         Route::get('/create', [RayonController::class, 'create'])->name('create');
//         Route::post('/store', [RayonController::class, 'store'])->name('store');
//         Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
//         Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
//         Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');
//     });

//     Route::prefix('/siswa')->name('siswa.')->group(function() {
//         Route::get('/', [StudentController::class, 'index'])->name('home');
//         Route::get('/create', [StudentController::class, 'create'])->name('create');
//         Route::post('/store', [StudentController::class, 'store'])->name('store');
//         Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
//         Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
//         Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
//     });
    
//     Route::prefix('/user')->name('user.')->group(function() {
//         Route::get('/', [UserController::class, 'index'])->name('home');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::post('/store', [UserController::class, 'store'])->name('store');
//         Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
//         Route::patch('/{id}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
//     });
    
//     Route::prefix('/keterlambatan')->name('keterlambatan.')->group(function() {
//         Route::get('/', [LateController::class, 'index'])->name('home');
//         Route::get('/create', [LateController::class, 'create'])->name('create');
//         Route::post('/store', [LateController::class, 'store'])->name('store');
//         Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
//         Route::patch('/{id}', [LateController::class, 'update'])->name('update');
//         Route::delete('/{id}', [LateController::class, 'destroy'])->name('delete');

//         Route::prefix('/rekapitulasi')->name('rekap.')->group(function() {
//             Route::get('/', [LateController::class, 'rekap'])->name('home');
//         });
//     });

//     Route::prefix('/order')->name('order.')->group(function() {
//         Route::get('/data', [OrderController::class, 'data'])->name('data');
//         Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
//         Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
//         Route::get('/search', [OrderController::class, 'searchAdmin'])->name('search');
//     });
// });