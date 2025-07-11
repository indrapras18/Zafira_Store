<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SesiContrller;
use App\Http\Controllers\SesiController;
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

// home
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [SesiController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SesiController::class, 'login']);
Route::post('/logout', [SesiController::class, 'logout'])->name('logout');

// barang
Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');

// sales
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/barangs', [SalesController::class, 'getBarangs'])->name('sales.barangs');
Route::post('/sales/store', [SalesController::class, 'store'])->name('sales.store');
