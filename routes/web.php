<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::prefix('api')->group(function() {
//     Route::post('register', [UserController::class, 'register'])->middleware('guest');
//     Route::post('login',[UserController::class,'login'])->middleware('guest');

//     Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
// });

