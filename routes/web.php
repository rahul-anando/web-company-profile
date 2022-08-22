<?php

use Illuminate\Support\Facades\Route;

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
    return view('');
});

Route::get('/oy', function () {
    return view('edit');
});



Route::get('/index', [ArticlesController::class, 'index']);
Route::get('/create', [ArticlesController::class, 'create']);
Route::post('/store', [ArticlesController::class, 'store'])->name('store');
Route::delete('delete/{articles:id}', [ArticlesController::class, 'delete'])->name('delete');
Route::get('edit/{articles:id}', [ArticlesController::class, 'edit'])->name('edit');
Route::put('update/{articles:id}', [ArticlesController::class, 'update'])->name('edit');