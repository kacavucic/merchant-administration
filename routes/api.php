<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantStoreController;
use App\Http\Controllers\StoreAgentController;
use App\Http\Controllers\StoreController;
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

Route::resource('merchants', MerchantController::class)->except(['create', 'edit']);
Route::resource('stores', StoreController::class)->except(['create', 'edit']);
Route::resource('merchants.stores', MerchantStoreController::class)->only(['index']);
Route::resource('agents', AgentController::class)->except(['create', 'edit']);
Route::resource('stores.agents', StoreAgentController::class)->only(['index']);

