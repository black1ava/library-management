<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Account\RegisterController;
use App\Http\Controllers\Account\LoginController;

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
    Route::get('/login', [LoginController::class, 'index'])->name('login.show');
});
