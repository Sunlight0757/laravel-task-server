<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [TestController::class, 'index']);
Route::post('/', [TestController::class, 'store']);
Route::get('/{id}', [TestController::class, 'show']);
Route::put('/{id}', [TestController::class, 'update']);
Route::delete('/{id}', [TestController::class, 'destroy']);
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::resource('posts', PostController::class);
});