<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::post('add_product', [AdminController::class, 'store_add_product'])->name('store_product');
Route::get('product', [AdminController::class, 'product'])->name('product');
Route::get('edit/{product}', [AdminController::class, 'edit'])->name('edit');
Route::patch('update/{product}', [AdminController::class, 'update'])->name('update');
Route::delete('delete/{product}', [AdminController::class, 'delete'])->name('delete');
