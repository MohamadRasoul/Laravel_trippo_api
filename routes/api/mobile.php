<?php

use App\Http\Controllers\Api\Mobile;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => 'city',
], function () {
    Route::get('index', [Mobile\CityController::class, 'index']);
    Route::get('indexTrending', [Mobile\CityController::class, 'indexTrending']);
    Route::get('{city}/show', [Mobile\CityController::class, 'show']);
    Route::get('{city}/image/index', [Mobile\CityController::class, 'indexImage']);
    Route::post('{city}/image/store', [Mobile\CityController::class, 'addImage']);
});


Route::group([
    "prefix" => 'question',
    "controller" => Mobile\QuestionController::class
], function () {
    Route::get('city/{city}/index', 'indexByCity');
    Route::post('city/{city}/store', 'store');
    Route::get('{question}/show', 'show');
    Route::delete('{question}/delete', 'destroy');
});


Route::group([
    "prefix" => 'answer',
    "controller" => Mobile\AnswerController::class
], function () {
    Route::post('question/{question}/store', 'store');
    Route::delete('{answer}/delete', 'destroy');
});


Route::group([
    "prefix" => 'featureTitle',
    "controller" => Mobile\FeatureTitleController::class
], function () {
    Route::get('index', 'index');
});


Route::group([
    "prefix" => 'feature',
    "controller" => Mobile\FeatureController::class
], function () {
    Route::get('index', 'index');
});
