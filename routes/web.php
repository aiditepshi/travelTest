<?php

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

Route::resource('customers', CustomerController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('klajdi');
Route::resource('/agencies', AgencyController::class);
Route::resource('trips', TripsController::class);

Route::post('post-login', [\App\Http\Controllers\AuthController::class, 'postLogin'])->name('postLogin');
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login') ;
Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register')->middleware('log'); ;
Route::post('post-register', [\App\Http\Controllers\AuthController::class, 'postRegister'])->name('register.post') ;
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('register.logout') ;

