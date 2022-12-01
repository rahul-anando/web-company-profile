<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TemplateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/main', function () {
        return view('main');
    });
    Route::get('/blade', function () {
        return view('template.blade.slider');
    });

    Route::prefix('users/')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::delete('delete/{users:id}', [UserController::class, 'delete'])->name('delete');
        Route::put('update/{users:id}', [UserController::class, 'update'])->name('update');
        Route::get('edit/{users:id}', [UserController::class, 'edit'])->name('edit');
    });

    Route::prefix('menus/')->name('menus.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('create', [MenuController::class, 'create'])->name('create');
        Route::post('store', [MenuController::class, 'store'])->name('store');
        Route::delete('delete/{menus:id}', [MenuController::class, 'delete'])->name('delete');
        Route::put('update/{menus:id}', [MenuController::class, 'update'])->name('update');
        Route::get('edit/{menus:id}', [MenuController::class, 'edit'])->name('edit');
    });

    Route::prefix('pages/')->name('pages.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('create', [PageController::class, 'create'])->name('create');
        Route::post('store', [PageController::class, 'store'])->name('store');
        Route::delete('delete/{pages:id}', [PageController::class, 'delete'])->name('delete');
        Route::put('update/{pages:id}', [PageController::class, 'update'])->name('update');
        Route::get('edit/{pages:id}', [PageController::class, 'edit'])->name('edit');
        Route::get('show/{id}', [PageController::class, 'show'])->name('show');
        Route::get('show/{page:id}', [PageController::class, 'back'])->name('back');
    });

    Route::prefix('templates/')->name('templates.')->group(function () {
        Route::get('/', [TemplateController::class, 'index'])->name('index');
        Route::get('create', [TemplateController::class, 'create'])->name('create');
        Route::post('store', [TemplateController::class, 'store'])->name('store');
        Route::delete('delete/{templates:id}', [TemplateController::class, 'delete'])->name('delete');
        Route::put('update/{templates:id}', [TemplateController::class, 'update'])->name('update');
        Route::get('edit/{templates:id}', [TemplateController::class, 'edit'])->name('edit');
    });

    Route::prefix('sections/')->name('sections.')->group(function () {
        Route::get('/', [SectionController::class, 'index'])->name('index');
        // Route::get('create', [SectionController::class, 'create'])->name('create');
        Route::post('store', [SectionController::class, 'store'])->name('store');
        Route::delete('delete/{sections:id}', [SectionController::class, 'delete'])->name('delete');
        Route::put('update/{sections:id}', [SectionController::class, 'update'])->name('update');
        Route::get('edit/{id}', [SectionController::class, 'edit'])->name('edit');
        Route::get('add', [SectionController::class, 'add_section'])->name('add');
    });
});
