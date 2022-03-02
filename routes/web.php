<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Account\RegisterController;
use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Account\LogoutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\BookController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('/account')->group(function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'index'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::delete('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::resource('/author', AuthorController::class);
Route::resource('/book_type', BookTypeController::class);
Route::resource('/book', BookController::class);
