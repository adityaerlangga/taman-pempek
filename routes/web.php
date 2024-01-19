<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/order', [AdminController::class, 'order']);

Route::prefix('page')->group(function () {
    Route::get('/home', [AdminController::class, 'page_home']);
    Route::get('/layanan-kami', [AdminController::class, 'page_layanan_kami']);
    Route::get('/tentang-kami', [AdminController::class, 'page_tentang_kami']);
    Route::get('/artikel', [AdminController::class, 'page_artikel']);
});
