<?php

use App\Http\Controllers\TestController;
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

Route::get('/customers', [TestController::class, 'index']);
Route::get('/customers/create', function () {
    return view('create');
});
Route::post('/customers/create', [TestController::class, 'store']);
Route::get('/search', [TestController::class, 'search'])->name('search');
