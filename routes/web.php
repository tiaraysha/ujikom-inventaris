<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/item', [ItemController::class, 'index'])->name('items');
    Route::post('/item', [ItemController::class, 'store'])->name('items.store');
    Route::put('/item/{$id}', [ItemController::class, 'update'])->name('items.update');
    Route::put('/item/export', [ItemController::class, 'export'])->name('items.export');
});

Route::prefix('/staff')->name('staff.')->group(function() {
    Route::get('/lending', [LendingController::class, 'index'])->name('lendings');
    Route::post('/lending', [LendingController::class, 'store'])->name('lendings.store');
    Route::delete('/lending/{id}', [LendingController::class, 'destroy'])->name('lendings.destroy');
    Route::put('/export', [LendingController::class, 'export'])->name('lendings.export');

    Route::get('/item', [ItemController::class, 'index'])->name('items');
    Route::post('/item', [ItemController::class, 'store'])->name('items.store');
    Route::put('/item/{$id}', [ItemController::class, 'update'])->name('items.update');
});
