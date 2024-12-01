<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;

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

// Brand Routes
Route::get('/brand', [BrandController::class, 'index']);
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('/brand/store', [BrandController::class, 'store']);
Route::get('/brand/edit/{brand_id}', [BrandController::class, 'edit']);
Route::put('/brand/update/{brand_id}', [BrandController::class, 'update']);
Route::delete('/brand/destroy/{brand_id}', [BrandController::class, 'destroy']);

// Caetgorie Routes
Route::get('/categorie', [CategorieController::class, 'index']);
Route::get('/categorie/create', [CategorieController::class, 'create']);
Route::post('/categorie/store', [CategorieController::class, 'store']);
Route::get('/categorie/edit/{category_id}', [CategorieController::class, 'edit']);
Route::put('/categorie/update/{category_id}', [CategorieController::class, 'update']);
Route::delete('/categorie/destroy/{category_id}', [CategorieController::class, 'destroy']);
