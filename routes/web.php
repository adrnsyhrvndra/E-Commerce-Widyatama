<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::class, 'index']);
Route::get('/users/create', [UsersController::class, 'create']); // Menampilkan form tambah data
Route::post('/users/store', [UsersController::class, 'store']);   
Route::get('/users/edit/{id}', [UsersController::class, 'edit']);
Route::put('/users/update/{id}', [UsersController::class, 'update']);
Route::delete('/users/destroy/{id}', [UsersController::class, 'destroy']);
