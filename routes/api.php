<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::post('register', [UserController::class, 'register']);
Route::post('login_user', [UserController::class, 'loginUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get_users_list', [UserController::class, 'getUsersList']);
    Route::post('get_user', [UserController::class, 'getUser']);
    Route::post('update_user', [UserController::class, 'updateUser']);
    Route::post('delete_user', [UserController::class, 'deleteUser']);
    // products
    Route::post('create_product', [ProductController::class, ' createProduct']);
    Route::get('get_products_list', [ProductController::class, ' getProductsList']);
    Route::post('get_product', [ProductController::class, ' getProduct']);
    Route::post('update_product', [ProductController::class, ' updateProduct']);
    Route::post('delete_product', [ProductController::class, ' deleteProduct']);
    // Get the price for each type of user
    Route::post('get_price', [ProductController::class, ' getPrice']);
});
