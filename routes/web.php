<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
    return view('pages');
});
Route::get('/create', function () {
    return view('create');
});

Route::get('pages', [PagesController::class, 'pages'])->name('pages');
Route::get('create', [PagesController::class, 'create'])->name('create');
Route::post('store', [PagesController::class, 'store'])->name('store');
Route::delete('destroy/{pages:id}', [PagesController::class, 'destroy'])->name('destroy');
Route::get('edit/{pages:id}', [PagesController::class, 'edit'])->name('edit');
Route::put('update/{pages:id}', [PagesController::class, 'update'])->name('update');
