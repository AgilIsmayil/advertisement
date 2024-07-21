<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Car\CarController;

Route::get('car-models/{car_id}', [CarController::class, 'getCarModelByCarId']);