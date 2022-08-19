<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//menus
Route::apiResource('/menus', App\Http\Controllers\Api\MenuController::class);

//categories
Route::apiResource('/categories', App\Http\Controllers\Api\CategoryController::class);

//profile restaurants
Route::apiResource('/profile-restaurants', App\Http\Controllers\Api\ProfileRestaurantController::class);