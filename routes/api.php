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
Route::get('/clients/deleted',[ClientsController::class,'deleted']);
Route::get('/clients/delete/{id}',[ClientsController::class,'delete']);
Route::get('/clients/undelete/{id}',[ClientsController::class,'undelete']);
Route::get('/clients/infos',[ClientsController::class,'infos']);
Route::apiResource('clients',ClientsController::class);

Route::get('/products/delete/{id}',[ProductsController::class,'delete']);
Route::get('/products/infos',[ProductsController::class,'infos']);
Route::get('/products/deleted',[ProductsController::class,'deleted']);
Route::get('/products/alerted',[ProductsController::class,'alerted']);
Route::apiResource('products',ProductsController::class);
Route::get('/products/undelete/{id}',[ProductsController::class,'undelete']);

Route::get('/providers/delete/{id}',[ProvidersController::class,'delete']);
Route::get('/providers/infos',[ProvidersController::class,'infos']);
Route::get('/providers/deleted',[ProvidersController::class,'deleted']);
Route::apiResource('providers',ProvidersController::class);
Route::get('/providers/undelete/{id}',[ProvidersController::class,'undelete']);

//Shops
Route::get('/shops/delete/{id}',[ShopsController::class,'delete']);
Route::get('/shops/infos',[ShopsController::class,'infos']);
Route::get('/shops/deleted',[ShopsController::class,'deleted']);
Route::apiResource('shops',ShopsController::class);
Route::get('/shops/undelete/{id}',[ShopsController::class,'undelete']);


Route::apiResource('sells',SellsController::class);
Route::apiResource('bons',BonsController::class);

