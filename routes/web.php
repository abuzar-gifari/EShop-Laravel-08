<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/',function(){
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontendController::class, 'index']);

    // ALL CATEGORIES ROUTES
    Route::get('/categories',[CategoryController::class, 'index']);
    Route::get('/add-categories',[CategoryController::class, 'AddCategory']);
    Route::post('/insert-categories',[CategoryController::class, 'InsertCategory']);
    Route::get('/edit-category/{id}',[CategoryController::class, 'EditCategory']);
    Route::put('/update-categories/{id}',[CategoryController::class, 'UpdateCategory']);
    Route::delete('/delete-categories/{id}',[CategoryController::class, 'DeleteCategory']);


    // ALL PRODUCTS ROUTES
    Route::get('/products',[ProductController::class, 'index']);
    Route::get('/add-products',[ProductController::class, 'AddProducts']);
    Route::post('/insert-products',[ProductController::class, 'InsertProducts']);
    Route::get('/edit-product/{id}',[ProductController::class, 'EditProducts']);
    Route::put('/update-products/{id}',[ProductController::class, 'UpdateProducts']);
    Route::delete('/delete-products/{id}',[ProductController::class, 'DeleteProducts']);
});

