<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ItemGenreController;
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
    return view('welcome');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.auth.login');
    })->name('login.home');
    Route::post('login', [AuthController::class, 'adminLogin'])->name('login');
    Route::get('logout', [AuthController::class, 'adminLogout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');

        Route::prefix('users')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin-users.index');
            Route::get('/new', [AdminUserController::class, 'create'])->name('admin-users.create');
            Route::post('/update', [AdminUserController::class, 'update'])->name('admin-users.update');
            Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin-users.edit');
            Route::post('/delete', [AdminUserController::class, 'delete'])->name('admin-users.delete');
        });

        Route::prefix('item-genre')->group(function () {
            Route::get('/', [ItemGenreController::class, 'index'])->name('genre.index');
            Route::get('/new', [ItemGenreController::class, 'create'])->name('genre.create');
            Route::post('/update', [ItemGenreController::class, 'update'])->name('genre.update');
            Route::get('/edit{id}', [ItemGenreController::class, 'edit'])->name('genre.edit');
            Route::post('/delete', [ItemGenreController::class, 'delete'])->name('genre.delete');
        });

    });
});
