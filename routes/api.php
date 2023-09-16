<?php

use App\Http\Controllers\Api\AdvertisementController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryTypeController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SocialMediaController;
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
// Category Type
Route::apiResource('category/types', CategoryTypeController::class)->except(['store', 'update', 'destroy']);

// Category
Route::apiResource('categories', CategoryController::class)->except(['store', 'update', 'destroy']);
Route::get('sub/category/{id}',[CategoryController::class,'getNestedCategories']);

// Zone
Route::apiResource('zones', ZoneController::class)->except(['store', 'update', 'destroy']);
Route::get('zone/cities/{id}',[ZoneController::class,'getCities']);

// City
Route::apiResource('cities', CityController::class)->except(['store', 'update', 'destroy']);

// Service
Route::apiResource('services', ServiceController::class)->except(['store', 'update', 'destroy']);

// Advertisement
Route::apiResource('advertisements', AdvertisementController::class)->except(['store', 'update', 'destroy']);

// Page
Route::apiResource('pages', PageController::class)->except(['store', 'update', 'destroy']);

// Social Media
Route::apiResource('socials', SocialMediaController::class)->except(['store', 'update', 'destroy']);

// Contact Us
Route::apiResource('contact-us', ContactUsController::class)->except(['index', 'show', 'update', 'destroy']);

// Customer
Route::get('customers/{id}', [AuthController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Advertisement
    Route::get('customer/advertisements/', [AdvertisementController::class, 'getCustomerAdvertisements']);
    Route::post('advertisements', [AdvertisementController::class, 'store']);
    Route::put('advertisements/{id}', [AdvertisementController::class, 'update']);
    Route::delete('advertisements/{id}', [AdvertisementController::class, 'destroy']);

    // Auth
    Route::delete('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/customer', [AuthController::class, 'getAuthCustomer']);

});
Route::middleware(['guest:sanctum'])->group(function () {
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/register', [AuthController::class, 'register']);
});
