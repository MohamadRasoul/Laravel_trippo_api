<?php

use App\Http\Controllers\Api\Mobile\AnswerController;
use App\Http\Controllers\Api\Mobile\CityController;
use App\Http\Controllers\Api\Mobile\FeatureController;
use App\Http\Controllers\Api\Mobile\FeatureTitleController;
use App\Http\Controllers\Api\Mobile\QuestionController;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => 'city',
    "controller" => CityController::class
], function () {
    Route::get('index', 'index');
    Route::get('indexTrending', 'indexTrending');
    Route::get('show', 'show');
});


Route::group([
    "prefix" => 'question',
    "controller" => QuestionController::class
], function () {
    Route::get('city/{city}/index', 'indexByCity');
    Route::post('city/{city}/store', 'store');
    Route::get('{question}/show', 'show');
    Route::delete('{question}/delete', 'destroy');
});


Route::group([
    "prefix" => 'answer',
    "controller" => AnswerController::class
], function () {
    Route::post('question/{question}/store', 'store');
    Route::delete('{answer}/delete', 'destroy');
});


Route::group([
    "prefix" => 'featureTitle',
    "controller" => FeatureTitleController::class
], function () {
    Route::get('index', 'index');
});


Route::group([
    "prefix" => 'feature',
    "controller" => FeatureController::class
], function () {
    Route::get('index', 'index');
});
