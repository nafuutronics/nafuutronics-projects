<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SmartAquariumsController;
use App\Http\Controllers\SmartBedsController;
use App\Http\Controllers\SmartMetersController;
use App\Models\SmartBed;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// projects.nafuutronics routes
Route::get('/', [HomeController::class, 'index']);
Route::get('index', [HomeController::class, 'index']);
Route::get('portfolio', [HomeController::class, 'portfolio']);
Route::get('p-hosting', [HomeController::class, 'hosting']);

Route::get('migrate-refresh', [HomeController::class, 'migrationRefresh']);
Route::get('migrate', [HomeController::class, 'migration']);
Route::get('storage-link', [HomeController::class, 'storageLink']);

Route::group(array('prefix' => 'iot'), function () {
    Route::group(array('prefix' => 'smart-bed'), function () {
        Route::get('get-data', [SmartBedsController::class, 'getData']);
        Route::get('stunting-who-data', [SmartBedsController::class, 'stuntingData']);
    });
    Route::resource('smart-bed', SmartBedsController::class);
    Route::resource('smart-aquarium', SmartAquariumsController::class);

    Route::group(array('prefix' => 'smart-meter'), function () {
        Route::get('get-tariff', [SmartMetersController::class, 'getTariff']);
        Route::get('update-tariff', [SmartMetersController::class, 'updateTariff']);
        Route::get('delete-tariff', [SmartMetersController::class, 'deleteTariff']);
        Route::get('seed', [SmartMetersController::class, 'seedSmartMeter']);
    });
    Route::resource('smart-meter', SmartMetersController::class);
});
