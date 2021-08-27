<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencyController;




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

Route::get('/', function(){
    return view ('welcome');
});

// Route::resource('agencies', AgencyController::class);


Route::get('/agencies',[AgencyController::class,('agency')]);
Route::get('/agencies/delete/{id}',[AgencyController::class,('delete')]);
Route::view('/agencies/create','agencies.create');
Route::post('/agencies/create',[AgencyController::class,('add')]);
Route::get('/agencies/update/{id}',[AgencyController::class,('update')]);
Route::get('/agencies/update/',[AgencyController::class,('change')]);
  