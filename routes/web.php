<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User Routes
    Route::group(['middleware' => ['role:user|admin']], function(){
        Route::get('/',[userController::class, 'index'])->name('home');
        Route::get('/category/products/{id}',[userController::class, 'categoryProducts'])->name('category.products');
        Route::get('/product/{id}/cart',[userController::class, 'cart'])->name('product.cart');
        Route::get('/search/results',[userController::class, 'search'])->name('search.product');
        Route::get('/myaccount/profile',[userController::class, 'account'])->name('myaccount.profile');
        Route::put('/myaccount/update/profile',[userController::class, 'updateAccount'])->name('update.profile');
        Route::put('/myaccount/update/password',[userController::class, 'updatePassword'])->name('update.password');
        Route::put('/profile/check',[userController::class, 'profileCheck'])->name('profile.check');
    });

    // Admin Routes
    Route::group(['middleware' => ['role:admin']], function(){
            Route::get('/admin',[adminController::class, 'index'])->name('admin');
            Route::resource('/users',AllUserController::class);
            Route::resource('/categories',CategoryController::class);
            Route::resource('/products',ProductController::class);
    }); 

});

require __DIR__.'/auth.php';
