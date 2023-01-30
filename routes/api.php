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

Route::middleware('auth:sanctum')->group( function () {
    Route::prefix('/bushes')->group(function () {
        Route::get('/', [\App\Http\Controllers\BushController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\BushController::class, 'store']);
    });
    Route::prefix('/projects')->group(function () {
        Route::get('/{bush}', [\App\Http\Controllers\ProjectController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\ProjectController::class, 'store']);
    });
    Route::prefix('/metals')->group(function () {
        Route::get('/', [\App\Http\Controllers\MetalController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\MetalController::class, 'store']);
        Route::get('/{product}', [\App\Http\Controllers\MetalController::class, 'show']);
    });
    Route::prefix('/sizes')->group(function () {
        Route::post('/', [\App\Http\Controllers\SizeController::class, 'store']);
    });
    Route::prefix('/product_standards')->group(function () {
        Route::post('/', [\App\Http\Controllers\ProductStandardController::class, 'store']);
    });
    Route::prefix('/steel_grade')->group(function () {
        Route::get('/', [\App\Http\Controllers\SteelGradeController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\SteelGradeController::class, 'store']);
        Route::get('/{steelGrade}', [\App\Http\Controllers\SteelGradeController::class, 'show']);
        Route::post('/steel_standard', [\App\Http\Controllers\SteelGradeController::class, 'standardStore']);
    });
});
