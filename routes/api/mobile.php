<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Mobile\CityController;



Route::group([
    "prefix"     => 'city',
    "controller" => CityController::class
], function () {
    Route::get('index', 'index');
    Route::get('indexTrending', 'indexTrending');
});
