<?php

use App\Http\Api\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;



Route::post('/login',  [AuthController::class, 'login']);
Route::post('/register',  [AuthController::class, 'register']);
Route::get('/verify-token',  [AuthController::class, 'verifyToken']);

Route::middleware('auth:sanctum')->post('/renew-token',  [AuthController::class, 'renewToken']);


Route::middleware('auth:sanctum')->group(function ()  {

    Route::get('/user/me', [UserController::class, 'index']);
    Route::put('user/me/image', [UserController::class, 'uploadImage']);
    Route::put('/user/me', [UserController::class, 'update']);
    Route::delete('/user/me', [AuthController::class, 'delete']);
    Route::post('/user/create-moderator', [UserController::class, 'createModerator'])->middleware('admin');


    Route::apiResource('addresses', AddressController::class);


    Route::middleware('admin')->group(function () {
        Route::post('/products', [ProductsController::class, 'store']);
        Route::put('/products/{product_id}', [ProductsController::class, 'update']);
        Route::delete('/products/{product_id}', [ProductsController::class, 'destroy']);
        Route::post('/products/{product_id}/images', [ProductsController::class, 'image']);
    });




});
