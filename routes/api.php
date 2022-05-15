<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('merchants', MerchantController::class)->only(['update', 'store', 'destroy']);
    Route::resource('stores', StoreController::class)->only(['update', 'store', 'destroy']);
    Route::resource('agents', AgentController::class)->only(['update', 'store', 'destroy']);
});

Route::group(['middleware' => ['auth:sanctum', 'role:user,admin']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('merchants', MerchantController::class)->only(['index', 'show']);
    Route::resource('stores', StoreController::class)->only(['index', 'show']);
    Route::resource('agents', AgentController::class)->only(['index', 'show']);

    Route::resource('merchants.stores', MerchantStoreController::class)->only(['index']);
    Route::resource('stores.agents', StoreAgentController::class)->only(['index']);


    
});

