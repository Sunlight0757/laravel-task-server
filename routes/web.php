<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [TestController::class, 'index']);
Route::post('/', [TestController::class, 'store']);
Route::get('/{id}', [TestController::class, 'show']);
Route::put('/{id}', [TestController::class, 'update']);
Route::delete('/{id}', [TestController::class, 'destroy']);
