<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ajax/get/emiData', [\App\Http\Controllers\emicontroller::class, 'getEmi'])->name('emi')->middleware('auth');
Route::get('history', [\App\Http\Controllers\emicontroller::class, 'getHistory'])->name('history')->middleware('auth');
