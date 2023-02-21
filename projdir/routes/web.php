<?php

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
    });
    Route::post('login', [AuthController::class, 'adminLogin'])->name('login');

    Route::middleware('auth:admin_users')->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');
    });
});
