<?php

use App\Http\Controllers\Api\Dashboard\AnswerController;
use App\Http\Controllers\Api\Dashboard\CityController;
use App\Http\Controllers\Api\Dashboard\FeatureController;
use App\Http\Controllers\Api\Dashboard\FeatureTitleController;
use App\Http\Controllers\Api\Dashboard\QuestionController;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => 'city',
    "controller" => CityController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{city}/show', 'show');
    Route::post('{city}/update', 'update');
    Route::delete('{city}/delete', 'destroy');
});


Route::group([
    "prefix" => 'question',
    "controller" => QuestionController::class
], function () {
    Route::get('city/{city}/index', 'indexByCity');
    Route::get('{question}/show', 'show');
    Route::delete('{question}/delete', 'destroy');
});

Route::group([
    "prefix" => 'answer',
    "controller" => AnswerController::class
], function () {
    Route::delete('{answer}/delete', 'destroy');
});


Route::group([
    "prefix" => 'featureTitle',
    "controller" => FeatureTitleController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{featureTitle}/show', 'show');
    Route::post('{featureTitle}/update', 'update');
    Route::delete('{featureTitle}/delete', 'destroy');
});


Route::group([
    "prefix" => 'feature',
    "controller" => FeatureController::class
], function () {
    Route::get('index', 'index');
    Route::post('featureTitle/{featureTitle}/store', 'store');
    Route::get('{feature}/show', 'show');
    Route::post('{feature}/update', 'update');
    Route::delete('{feature}/delete', 'destroy');
});




