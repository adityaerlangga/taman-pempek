<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/layanan-kami', [HomeController::class, 'layanan_kami']);
Route::get('/tentang-kami', [HomeController::class, 'tentang_kami']);
Route::get('/artikel', [HomeController::class, 'artikel']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/check_login', [AuthController::class, 'check_login']);


Route::group(['middleware' => ['isLogin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/order', [TransactionController::class, 'order']);
    Route::get('/order/detail/{order_id}', [TransactionController::class, 'order_detail']);

    Route::get('/product_categories', [ProductCategoryController::class, 'index']);
    Route::get('/product_categories/create', [ProductCategoryController::class, 'create']);
    Route::post('/product_categories/store', [ProductCategoryController::class, 'store']);
    Route::get('/product_categories/delete/{product_category_code}', [ProductCategoryController::class, 'delete']);
    Route::get('/product_categories/edit/{product_category_code}', [ProductCategoryController::class, 'edit']);
    Route::post('/product_categories/update', [ProductCategoryController::class, 'update']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store']);
    Route::get('/products/delete/{product_category_code}', [ProductController::class, 'delete']);
    Route::get('/products/edit/{product_category_code}', [ProductController::class, 'edit']);
    Route::post('/products/update', [ProductController::class, 'update']);


    Route::prefix('page')->group(function () {
        Route::get('/home', [AdminController::class, 'page_home']);
        Route::get('/layanan-kami', [AdminController::class, 'page_layanan_kami']);
        Route::get('/tentang-kami', [AdminController::class, 'page_tentang_kami']);
        Route::get('/artikel', [AdminController::class, 'page_artikel']);
    });
});
