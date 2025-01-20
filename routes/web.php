<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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

      // User Routes
      Route::get('/user', [UsersController::class, 'index']);
      Route::get('/user/create', [UsersController::class, 'create']);
      Route::post('/user/store', [UsersController::class, 'store']);
      Route::get('/user/edit/{user_id}', [UsersController::class, 'edit']);
      Route::put('/user/update/{user_id}', [UsersController::class, 'update']);
      Route::delete('/user/destroy/{user_id}', [UsersController::class, 'destroy']);

      // Order Routes
      Route::get('/orderAdmin', [OrderController::class, 'orderAdmin']);
      Route::put('/orderAdmin/update/{order_id}', [OrderController::class, 'orderAdminUpdate']);

      // Payment Routes
      Route::get('/paymentAdmin', [PaymentController::class, 'paymentAdmin']);
      Route::put('/paymentAdmin/update/{payment_id}', [PaymentController::class, 'paymentAdminUpdate']);
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
Route::get('/addresses/form', [StoreController::class, 'formAddresesPage'])->middleware('auth');
Route::post('/addresses/store', [StoreController::class, 'addAddress'])->middleware('auth');
Route::get('/addresses/edit/{address_id}', [StoreController::class, 'editAddress'])->middleware('auth');
Route::put('/addresses/update/{address_id}', [StoreController::class, 'updateAddress'])->middleware('auth');
Route::put('/addresses/updateMainAddress/{address_id}', [StoreController::class, 'updateMainAddress'])->middleware('auth');
Route::put('/addresses/removeMainAddress/{address_id}', [StoreController::class, 'removeMainAddress'])->middleware('auth');
Route::delete('/addresses/delete/{address_id}', [StoreController::class, 'deleteAddress'])->middleware('auth');
Route::post('/order/store', [OrderController::class, 'store'])->middleware('auth');
Route::delete('/order/delete/{order_item_id}', [OrderController::class, 'delete'])->middleware('auth');
Route::get('/mycart', [OrderController::class, 'index'])->middleware('auth');
Route::get('/myorders', [OrderController::class, 'order_history'])->middleware('auth');
Route::post('/payment/store', [PaymentController::class, 'store'])->middleware('auth');
Route::get('/payment/edit/{payment_id}', [PaymentController::class, 'choosePaymentMethod'])->middleware('auth');
Route::put('/payment/update/{payment_id}', [PaymentController::class, 'update'])->middleware('auth');