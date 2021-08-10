<?php

use App\Http\Controllers\ajaxController;
use App\Http\Controllers\AnimalController;
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

Route::resource('animals', AnimalController::class);
Route::get('/animals', [AnimalController::class, 'index']);
Route::get('/search', [AnimalController::class, 'search'])->name('search');
Route::get('/', function(){
    return view('index');
});
Route::post('/',[ajaxController::class, 'click'])->name('clickBtn');