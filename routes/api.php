<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SecretController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/guardener'], function () {
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/auth', [LoginController::class, 'checkAuth'])->middleware('auth:sanctum');
    Route::get('/secret', [SecretController::class, 'showSecret'])->middleware('auth:sanctum');
});
