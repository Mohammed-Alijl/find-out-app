<?php

use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryTypeController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ZoneController;
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

// Category Type
Route::apiResource('category/types',CategoryTypeController::class)->except(['store','update','destroy']);

// Category
Route::apiResource('categories',CategoryController::class)->except(['store','update','destroy']);

// Zone
Route::apiResource('zones',ZoneController::class)->except(['store','update','destroy']);

// City
Route::apiResource('cities',CityController::class)->except(['store','update','destroy']);

// Service
Route::apiResource('services',ServiceController::class)->except(['store','update','destroy']);

// Advertisement
Route::apiResource('advertisements',AdvertisementController::class);
Route::get('customer/advertisements/',[AdvertisementController::class,'getCustomerAdvertisements']);

// Page
Route::apiResource('pages',PageController::class)->except(['store','update','destroy']);
