<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
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
        Route::resource('zones',ZoneController::class);
    });

    //Auth:guest
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('admin.login.store');
    });
});
