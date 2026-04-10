<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LendingController;

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/item', [ItemController::class, 'index'])->name('items');
Route::post('/item', [ItemController::class, 'store'])->name('items.store');
Route::put('/item/{$id}', [ItemController::class, 'update'])->name('items.update');

Route::get('/lending', [LendingController::class, 'index'])->name('lendings');
Route::post('/lending', [LendingController::class, 'store'])->name('lendings.store');