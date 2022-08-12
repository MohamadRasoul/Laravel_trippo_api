<?php

use App\Http\Controllers\Api\Mobile;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => 'city',
], function () {
    Route::get('index', [Mobile\CityController::class, 'index']);
    Route::get('indexTrending', [Mobile\CityController::class, 'indexTrending']);
    Route::get('{city}/image/index', [Mobile\CityController::class, 'indexImage']);
    Route::get('{city}/show', [Mobile\CityController::class, 'show']);

    Route::post('{city}/image/store', [Mobile\CityController::class, 'addImage']);
});


Route::group([
    "prefix" => 'question',
], function () {
    Route::get('city/{city}/index', [Mobile\QuestionController::class, 'indexByCity']);
    Route::post('city/{city}/store', [Mobile\QuestionController::class, 'store']);
    Route::get('{question}/show', [Mobile\QuestionController::class, 'show']);
    Route::delete('{question}/delete', [Mobile\QuestionController::class, 'destroy']);
});


Route::group([
    "prefix" => 'answer',
], function () {
    Route::post('question/{question}/store', [Mobile\AnswerController::class, 'store']);
    Route::delete('{answer}/delete', [Mobile\AnswerController::class, 'destroy']);
});


Route::group([
    "prefix" => 'featureTitle',
], function () {
    Route::get('index', [Mobile\FeatureTitleController::class, 'index']);
});


Route::group([
    "prefix" => 'feature',
], function () {
    Route::get('index', [Mobile\FeatureController::class, 'index']);
});

Route::group([
    "prefix" => 'type',
], function () {
    Route::get('index', [Mobile\TypeController::class, 'index']);
});

Route::group([
    "prefix" => 'option',
], function () {
    Route::get('index', [Mobile\OptionController::class, 'index']);
});



Route::group([
    "prefix" => 'place',
], function () {
    Route::get('index', [Mobile\PlaceController::class, 'index']);
    // Route::get('indexTrending', [Mobile\PlaceController::class, 'indexTrending']);
    Route::get('{place}/image/index', [Mobile\PlaceController::class, 'indexImage']);
    Route::get('{place}/show', [Mobile\PlaceController::class, 'show']);
    Route::post('{place}/image/store', [Mobile\PlaceController::class, 'addImage']);
    Route::post('place_by_point_map', [Mobile\PlaceController::class, 'getPlacesWithPointMap']);
});


Route::group([
    "prefix" => 'favourite',
], function () {
    Route::get('index', [Mobile\FavouritePlaceController::class, 'index']);
    Route::post('{place_id}/changeStatus', [Mobile\FavouritePlaceController::class, 'changeStatus']);
});