<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD categories
    Route::resource('categories', CategoryController::class);
    // Trash (xóa mềm)
    Route::get('categories-trash', [CategoryController::class, 'trash'])->name('categories.trash');
    // Khôi phục
    Route::post('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    // Xóa vĩnh viễn
    Route::delete('categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.force-delete');
   // CRUD products
    Route::resource('products', ProductController::class);
    // Thùng rác
    Route::get('products-trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::post('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.force-delete');
});

