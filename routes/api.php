<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BonsController;
use App\Http\Controllers\SellsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\ProvidersController;

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
Route::apiResource('clients',ClientsController::class);
Route::apiResource('products',ProductsController::class);
Route::apiResource('providers',ProvidersController::class);
Route::apiResource('sells',SellsController::class);
Route::apiResource('shops',ShopsController::class);
Route::apiResource('bons',BonsController::class);

