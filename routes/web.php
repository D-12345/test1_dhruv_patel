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

// User Management
Route::get('user', [App\Http\Controllers\UserController::class, 'index']);
Route::post('save', [App\Http\Controllers\UserController::class, 'store']);

Route::get('list', [App\Http\Controllers\UserController::class, 'show']);

Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('update', [App\Http\Controllers\UserController::class, 'update']);

