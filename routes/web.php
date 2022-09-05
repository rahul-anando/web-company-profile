<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\GaleriesController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oy', function () {
    return view('edit');
});
// Route::get('/create', function () {
//     return view('create');
// });
Route::prefix('pages/')->name('pages.')->group(function () {
    Route::get('/', [PagesController::class, 'pages'])->name('pages');
    Route::get('create', [PagesController::class, 'create'])->name('create');
    Route::post('store', [PagesController::class, 'store'])->name('store');
    // Route::delete('destroy/{pages:id}', [PagesController::class, 'destroy'])->name('destroy');
    // Route::get('destroy/{pages:id}', [PagesController::class, 'destroy'])->name('destroy');
    Route::get('delete/{pages:id}', [PagesController::class, 'delete'])->name('delete');
    Route::get('edit/{pages:id}', [PagesController::class, 'edit'])->name('edit');
    Route::put('update/{pages:id}', [PagesController::class, 'update'])->name('update');
});
Route::prefix('galeries/')->name('galeries.')->group(function () {
    Route::get('/', [GaleriesController::class, 'index'])->name('index');
    Route::get('create', [GaleriesController::class, 'create'])->name('create');
    Route::post('store', [GaleriesController::class, 'store'])->name('store');
    Route::delete('delete/{galeries:id}', [GaleriesController::class, 'delete'])->name('delete');
    Route::get('edit/{galeries:id}', [GaleriesController::class, 'edit'])->name('edit');
    Route::put('update/{galeries:id}', [GaleriesController::class, 'update'])->name('update');
    
});
Route::prefix('articles/')->name('articles.')->group(function () {
    Route::get('/index', [ArticlesController::class, 'index']);
    Route::get('/create', [ArticlesController::class, 'create']);
    Route::post('/store', [ArticlesController::class, 'store'])->name('store');
    Route::delete('delete/{articles:id}', [ArticlesController::class, 'delete'])->name('delete');
    Route::get('edit/{articles:id}', [ArticlesController::class, 'edit'])->name('edit');
    Route::put('update/{articles:id}', [ArticlesController::class, 'update'])->name('edit');
});





