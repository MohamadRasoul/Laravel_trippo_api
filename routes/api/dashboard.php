<?php

use App\Http\Controllers\Api\Dashboard;
use Illuminate\Support\Facades\Route;




Route::group([
    "prefix" => 'city',
], function () {
    Route::get('index', [Dashboard\CityController::class, 'index']);
    Route::get('{city}/image/index', [Dashboard\CityController::class, 'indexImage']);
    Route::get('{city}/image/indexNotAccept', [Dashboard\CityController::class, 'indexImageNotAccept']);
    Route::get('{city}/show', [Dashboard\CityController::class, 'show']);

    Route::post('store', [Dashboard\CityController::class, 'store']);
    Route::post('{city}/image/store', [Dashboard\CityController::class, 'addImage']);
    Route::post('image/{image}/accept', [Dashboard\CityController::class, 'acceptImage']);
    Route::post('{city}/update', [Dashboard\CityController::class, 'update']);

    Route::delete('{city}/delete', [Dashboard\CityController::class, 'destroy']);
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
});


Route::group([
    "prefix" => 'place',
], function () {
    Route::get('index', [Dashboard\PlaceController::class, 'index']);
    Route::get('{place}/image/index', [Dashboard\PlaceController::class, 'indexImage']);
    Route::get('{place}/image/indexNotAccept', [Dashboard\PlaceController::class, 'indexImageNotAccept']);
    Route::get('{place}/show', [Dashboard\PlaceController::class, 'show']);

    Route::post('store', [Dashboard\PlaceController::class, 'store']);
    Route::post('{place}/image/store', [Dashboard\PlaceController::class, 'addImage']);
    Route::post('image/{image}/accept', [Dashboard\PlaceController::class, 'acceptImage']);
    Route::post('{place}/update', [Dashboard\PlaceController::class, 'update']);

    Route::delete('{place}/delete', [Dashboard\PlaceController::class, 'destroy']);
});
