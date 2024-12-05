<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;

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

// Route untuk admin
Route::middleware(['auth', 'checkRole:admin'])->group(function () {

      // Dashboard Admin Route
      Route::get('/admin', [AuthController::class, 'showDashboardAdminPage']);

      // Brand Routes
      Route::get('/brand', [BrandController::class, 'index']);
      Route::get('/brand/create', [BrandController::class, 'create']);
      Route::post('/brand/store', [BrandController::class, 'store']);
      Route::get('/brand/edit/{brand_id}', [BrandController::class, 'edit']);
      Route::put('/brand/update/{brand_id}', [BrandController::class, 'update']);
      Route::delete('/brand/destroy/{brand_id}', [BrandController::class, 'destroy']);

      // Categorie Routes
      Route::get('/categorie', [CategorieController::class, 'index']);
      Route::get('/categorie/create', [CategorieController::class, 'create']);
      Route::post('/categorie/store', [CategorieController::class, 'store']);
      Route::get('/categorie/edit/{category_id}', [CategorieController::class, 'edit']);
      Route::put('/categorie/update/{category_id}', [CategorieController::class, 'update']);
      Route::delete('/categorie/destroy/{category_id}', [CategorieController::class, 'destroy']);

      // Product Routes
      Route::get('/product', [ProductController::class, 'index']);
      Route::get('/product/create', [ProductController::class, 'create']);
      Route::post('/product/store', [ProductController::class, 'store']);
      Route::get('/product/edit/{product_id}', [ProductController::class, 'edit']);
      Route::put('/product/update/{product_id}', [ProductController::class, 'update']);
      Route::delete('/product/destroy/{product_id}', [ProductController::class, 'destroy']);
});

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Store User Route
Route::get('/', [AuthController::class, 'showStorePage'])->middleware('auth');
Route::get('/addresses', [StoreController::class, 'showAddresesPage'])->middleware('auth');
Route::post('/addresses/store', [StoreController::class, 'addAddress'])->middleware('auth');