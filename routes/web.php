<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\GaleriesController;
use App\Http\Controllers\PostController;

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

Route::prefix('galeries/')->name('galeries.')->group(function () {
    Route::get('/', [GaleriesController::class, 'index'])->name('index');
    Route::get('create', [GaleriesController::class, 'create'])->name('create');
    Route::post('store', [GaleriesController::class, 'store'])->name('store');
    Route::delete('delete/{galeries:id}', [GaleriesController::class, 'delete'])->name('delete');
    Route::get('edit/{galeries:id}', [GaleriesController::class, 'edit'])->name('edit');
    Route::put('update/{galeries:id}', [GaleriesController::class, 'update'])->name('update');

});

Route::prefix('posts/')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('create', [PostController::class, 'create'])->name('create');
    Route::post('store', [PostController::class, 'store'])->name('store');
    Route::delete('delete/{posts:id}', [PostController::class, 'delete'])->name('delete');
    Route::get('edit/{posts:id}', [PostController::class, 'edit'])->name('edit');
    Route::put('update/{posts:id}', [PostController::class, 'update'])->name('update');

});


