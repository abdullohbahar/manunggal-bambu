<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\WhatsappController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/admin/login', [AuthController::class, 'index'])->name('login');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Produk Route
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/create-product', [ProdukController::class, 'create'])->name('create-product');
    Route::post('/store-product', [ProdukController::class, 'store'])->name('store-product');
    Route::delete('/destroy-produk/{id}', [ProdukController::class, 'destroy'])->name('destroy-produk');
    Route::get('/add-image-product/{slug}', [ProdukController::class, 'addImageProduct'])->name('add-image-product');
    Route::post('/store-image-product', [ProdukController::class, 'storeImageProduct'])->name('store-image-product');
    Route::delete('/delete-image-product/{id}', [ProdukController::class, 'deleteImageProduct'])->name('delete-image-product');

    // Whatsapp Route
    Route::get('/whatsapp', [WhatsappController::class, 'index'])->name('whatsapp');
    Route::get('/create-whatsapp', [WhatsappController::class, 'create'])->name('create-whatsapp');
    Route::post('/store-whatsapp', [WhatsappController::class, 'store'])->name('store-whatsapp');
    Route::get('/edit-whatsapp/{id}', [WhatsappController::class, 'edit'])->name('edit-whatsapp');
    Route::put('/update-whatsapp/{id}', [WhatsappController::class, 'update'])->name('update-whatsapp');
    Route::delete('/destroy-whatsapp/{id}', [WhatsappController::class, 'destroy'])->name('destroy-whatsapp');
});
