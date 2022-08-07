<?php

use App\Http\Controllers\Api\Dashboard;
use Illuminate\Support\Facades\Route;




Route::group([
    "prefix" => 'city',
    "controller" => Dashboard\CityController::class
], function () {
    Route::get('index', 'index');
    Route::get('{city}/show', 'show');

    Route::post('store', 'store');
    Route::post('{city}/image/store', 'addImage');
    Route::post('{city}/update', 'update');

    Route::delete('{city}/delete', 'destroy');
});



Route::group([
    "prefix" => 'question',
    "controller" => Dashboard\QuestionController::class
], function () {
    Route::get('city/{city}/index', 'indexByCity');
    Route::get('{question}/show', 'show');
    Route::delete('{question}/delete', 'destroy');
});

Route::group([
    "prefix" => 'answer',
    "controller" => Dashboard\AnswerController::class
], function () {
    Route::delete('{answer}/delete', 'destroy');
});


Route::group([
    "prefix" => 'featureTitle',
    "controller" => Dashboard\FeatureTitleController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{featureTitle}/show', 'show');
    Route::post('{featureTitle}/update', 'update');
    Route::delete('{featureTitle}/delete', 'destroy');
});


Route::group([
    "prefix" => 'feature',
    "controller" => Dashboard\FeatureController::class
], function () {
    Route::get('index', 'index');
    Route::post('featureTitle/{featureTitle}/store', 'store');
    Route::post('{feature}/update', 'update');
    Route::delete('{feature}/delete', 'destroy');
});


Route::group([
    "prefix" => 'type',
    "controller" => Dashboard\TypeController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{type}/show', 'show');
    Route::post('{type}/update', 'update');
    Route::delete('{type}/delete', 'destroy');
});


Route::group([
    "prefix" => 'option',
    "controller" => Dashboard\OptionController::class
], function () {
    Route::get('index', 'index');
    Route::post('type/{type}/store', 'store');
    Route::post('{option}/update', 'update');
    Route::delete('{option}/delete', 'destroy');
});


Route::group([
    "prefix" => 'award',
    "controller" => Dashboard\AwardController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{award}/show', 'show');
    Route::post('{award}/update', 'update');
    Route::delete('{award}/delete', 'destroy');
});

Route::group([
    "prefix" => 'place',
    "controller" => Dashboard\PlaceController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{place}/show', 'show');
    Route::post('{place}/update', 'update');
    Route::delete('{place}/delete', 'destroy');
});
