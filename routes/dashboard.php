<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Car\QueryController as CarQueryController;
use App\Http\Controllers\Dashboard\Car\CommandController as CarCommandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CarModel\CommandController as CarModelCommandController;
use App\Http\Controllers\Dashboard\CarModel\QueryController as CarModelQueryController;
use App\Http\Controllers\Dashboard\SiteUser\QueryController as SiteUserQueryController;
use App\Http\Controllers\Dashboard\Advertisement\ViewController;
use App\Http\Controllers\Dashboard\Advertisement\CommandController as AdvertisementCommandController;


Route::group(['middleware' => 'notLogin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'car', 'as' => 'car.'], function () {
        #Query
        Route::get('/create', [CarQueryController::class, 'create'])->name('create');
        Route::get('/index', [CarQueryController::class, 'index'])->name('index');
        Route::get('/index/trash', [CarQueryController::class, 'trash'])->name('index.trash');
        Route::get('/edit/{id}', [CarQueryController::class, 'edit'])->name('edit');
        #Command
        Route::post('/store', [CarCommandController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CarCommandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CarCommandController::class, 'delete'])->name('delete');
        Route::get('/delete-back/{id}', [CarCommandController::class, 'deleteBack'])->name('delete.back');
    });

    Route::group(['prefix' => 'car-model', 'as' => 'car-model.'], function () {
        #Query
        Route::get('/create', [CarModelQueryController::class, 'create'])->name('create');
        Route::get('/index', [CarModelQueryController::class, 'index'])->name('index');
        Route::get('/index/trash', [CarModelQueryController::class, 'trash'])->name('index.trash');
        Route::get('/edit/{id}', [CarModelQueryController::class, 'edit'])->name('edit');
        #Command
        Route::post('/store', [CarModelCommandController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CarModelCommandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CarModelCommandController::class, 'delete'])->name('delete');
        Route::get('/delete-back/{id}', [CarModelCommandController::class, 'deleteBack'])->name('delete.back');
    });

    Route::group(['prefix' => 'site-user', 'as' => 'site-user.'], function () {
        #Query
        Route::get('/index', [SiteUserQueryController::class, 'index'])->name('index');
        Route::get('/report/monthly', [SiteUserQueryController::class, 'reportMonthly'])->name('report.monthly');
    });
    Route::group(['prefix' => 'advertisement', 'as' => 'advertisement.'], function () {
        #Query
        Route::get('/index', [ViewController::class, 'index'])->name('index');
        Route::get('/show/{id}', [ViewController::class, 'show'])->name('show');
        Route::get('/approve/{id}', [AdvertisementCommandController::class, 'approve'])->name('approve');
        Route::get('/reject/{id}', [AdvertisementCommandController::class, 'reject'])->name('reject');
    });
});


Route::get('/login', [AuthController::class, 'loginPage'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
