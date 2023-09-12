<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryTypeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
    //Dashboard
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        //Auth
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

        //Zone
        Route::resource('zones',ZoneController::class)->except(['create','show','edit']);
        Route::get('zone-cities/{id}', [ZoneController::class, 'getZoneCities']);

        //City
        Route::resource('cities',CityController::class)->except(['create','show','edit']);

        //Category Type
        Route::resource('category/types',CategoryTypeController::class)->except(['create','show','edit']);
        Route::get('category-type-services/{id}', [CategoryTypeController::class, 'getServices']);

        //Category
        Route::resource('categories',CategoryController::class)->except(['create','edit']);
        Route::get('sub-categories/{id}', [CategoryController::class, 'getSubCategories']);

        //Customer
        Route::resource('customers',CustomerController::class)->except(['show']);
        Route::post('/check-email', [CustomerController::class, 'checkEmail'])->name('check-email');
        Route::post('/check-mobile', [CustomerController::class, 'checkMobile'])->name('check-mobile-number');

        //Service
        Route::resource('services',ServiceController::class);

        //Advertisement
        Route::resource('advertisements',AdvertisementController::class);
        Route::get('ad-approve/{id}',[AdvertisementController::class,'approve'])->name('advertisement.approve');
        Route::get('ad/requests',[AdvertisementController::class,'advertisementRequests'])->name('advertisement.requests');
    });

    //Auth:guest
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('admin.login.store');
    });
});
