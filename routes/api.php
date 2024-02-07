<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\MapScenarioController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);


Route::get('users', [Controller::class, 'index']);
Route::get('characters', [CharacterController::class, 'index']);

Route::get('classes', [ClasseController::class, 'index']);
Route::get('maps', [MapController::class, 'index']);
Route::get('scenarios', [ScenarioController::class, 'index']);
Route::get('map-scenario', [MapScenarioController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {

});
