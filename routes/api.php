<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DragonController;
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

Route::post('/register', [AuthController::class, 'SignUp']);
Route::post('/login', [AuthController::class, 'SignIn']);
Route::post('/logout', [AuthController::class, 'Logout']);

//dragon
Route::post('/dstore', [DragonController::class, 'store']);
Route::get('/a', [DragonController::class, 'index']);
Route::put('/dragon/{id}', [DragonController::class, 'update']);

//color
Route::put('/color/{id}', [ColorController::class, 'update']);
Route::post('/store', [ColorController::class, 'store']);
Route::get('/index', [ColorController::class, 'index']);
Route::get('/destroy/{id}', [ColorController::class, 'destroy']);
