<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
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

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');

        Route::prefix('users')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin-users.index');
            Route::get('/new', [AdminUserController::class, 'create'])->name('admin-users.create');
            Route::POST('/update', [AdminUserController::class, 'update'])->name('admin-users.update');
        });

    });
});
