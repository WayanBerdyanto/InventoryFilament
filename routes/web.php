<?php

use App\Http\Controllers\Customer\ProductController;
use App\Models\TransactionProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('customer.product.index');
    Route::get('/transaction', [TransactionProduct::class, 'index'])->name('customer.transaction.index');
});

