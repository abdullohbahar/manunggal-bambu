<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\WhatsappController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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

Route::get('/admin/login', [AuthController::class, 'index'])->name('login');

Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Produk Route
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/create-product', [ProdukController::class, 'create'])->name('create-product');
    Route::post('/store-product', [ProdukController::class, 'store'])->name('store-product');
    Route::get('/edit-product/{slug}', [ProdukController::class, 'edit'])->name('edit-product');
    Route::put('/update-product/{slug}', [ProdukController::class, 'update'])->name('update-product');
    Route::delete('/destroy-produk/{id}/{slug}', [ProdukController::class, 'destroy'])->name('destroy-produk');
    Route::get('/add-image-product/{slug}', [ProdukController::class, 'addImageProduct'])->name('add-image-product');
    Route::post('/store-image-product', [ProdukController::class, 'storeImageProduct'])->name('store-image-product');
    Route::put('/update-thumbnail-product/{slug}', [ProdukController::class, 'updateThumbnailProduct'])->name('update-thumbnail-product');
    Route::delete('/delete-image-product/{id}', [ProdukController::class, 'deleteImageProduct'])->name('delete-image-product');

    // Whatsapp Route
    Route::get('/whatsapp', [WhatsappController::class, 'index'])->name('whatsapp');
    Route::get('/create-whatsapp', [WhatsappController::class, 'create'])->name('create-whatsapp');
    Route::post('/store-whatsapp', [WhatsappController::class, 'store'])->name('store-whatsapp');
    Route::get('/edit-whatsapp/{id}', [WhatsappController::class, 'edit'])->name('edit-whatsapp');
    Route::put('/update-whatsapp/{id}', [WhatsappController::class, 'update'])->name('update-whatsapp');
    Route::delete('/destroy-whatsapp/{id}', [WhatsappController::class, 'destroy'])->name('destroy-whatsapp');

    // Profile Route
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/update-profile/{id}', [ProfileController::class, 'update'])->name('update-profile');
});
