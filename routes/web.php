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

Route::post('/show', [App\Http\Controllers\TestController::class, 'retrieveJson']);
Route::post('/create', [App\Http\Controllers\TestController::class, 'createJson']);
Route::post('/update', [App\Http\Controllers\TestController::class, 'editJson']);
Route::post('/delete', [App\Http\Controllers\TestController::class, 'destroyJson']);
