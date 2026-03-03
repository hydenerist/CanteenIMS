<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockEntryController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class)->only(['index', 'show', 'create', 'store']);
Route::resource('suppliers', SupplierController::class)->only(['index', 'show', 'create', 'store']);
Route::resource('stock-entries', StockEntryController::class)->only(['create', 'store']);