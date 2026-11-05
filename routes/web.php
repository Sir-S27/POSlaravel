<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.welcome');
});
// Route::get('/produk', function () {
//     return view('produk');
// });
Route::get('/produk',[ProductController::class,'index'])->name("produk.index");
Route::get('/produk/edit/{id}',[ProductController::class,'edit'])->name("produk.edit");
Route::get('/produk/create',[ProductController::class,'create'])->name("produk.create");
Route::post('/produk',[ProductController::class,'store'])->name("produk.store");
Route::put('/produk/update/{id}',[ProductController::class,'update'])->name("produk.update");
Route::delete('/produk/delete/{id}',[ProductController::class,'destroy'])->name("produk.destroy");
// Route::get('/produk/edit/{id?}',[ProductController::class,'edit'])->name("produk.edit");

Route::get('/pelanggan', function () {
    return view('pelanggan');
});
Route::get('/suplier', [SuplierController::class, 'index'])->name("suplier.index");
Route::get('/suplier/edit/{id}', [SuplierController::class, 'edit'])->name("suplier.edit");
Route::get('/suplier/create', [SuplierController::class, 'create'])->name("suplier.create");
Route::post('/suplier', [SuplierController::class, 'store'])->name("suplier.store");

Route::get('/kategori', [KategoriController::class, 'index'])->name("kategori.index");
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name("kategori.edit");
Route::get('/kategori/create', [KategoriController::class, 'create'])->name("kategori.create");
Route::post('/kategori', [KategoriController::class, 'store'])->name("kategori.store");
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name("kategori.update");
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name("kategori.destroy");