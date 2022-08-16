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
], function () {
    Route::get('city/{city}/index', [Dashboard\QuestionController::class, 'indexByCity']);
    Route::get('{question}/show', [Dashboard\QuestionController::class, 'show']);
    Route::delete('{question}/delete', [Dashboard\QuestionController::class, 'destroy']);
});

Route::group([
    "prefix" => 'answer',
], function () {
    Route::delete('{answer}/delete', [Dashboard\AnswerController::class, 'destroy']);
});


Route::group([
    "prefix" => 'featureTitle',
], function () {
    Route::get('index', [Dashboard\FeatureTitleController::class, 'index']);
    Route::post('store', [Dashboard\FeatureTitleController::class, 'store']);
    Route::get('{featureTitle}/show', [Dashboard\FeatureTitleController::class, 'show']);
    Route::post('{featureTitle}/update', [Dashboard\FeatureTitleController::class, 'update']);
    Route::delete('{featureTitle}/delete', [Dashboard\FeatureTitleController::class, 'destroy']);
});


Route::group([
    "prefix" => 'feature',
], function () {
    Route::get('index', [Dashboard\FeatureController::class, 'index']);
    Route::post('featureTitle/{featureTitle}/store', [Dashboard\FeatureController::class, 'store']);
    Route::post('{feature}/update', [Dashboard\FeatureController::class, 'update']);
    Route::delete('{feature}/delete', [Dashboard\FeatureController::class, 'destroy']);
});


Route::group([
    "prefix" => 'type',
], function () {
    Route::get('index', [Dashboard\TypeController::class, 'index']);
    Route::post('store', [Dashboard\TypeController::class, 'store']);
    Route::get('{type}/show', [Dashboard\TypeController::class, 'show']);
    Route::post('{type}/update', [Dashboard\TypeController::class, 'update']);
    Route::delete('{type}/delete', [Dashboard\TypeController::class, 'destroy']);
});


Route::group([
    "prefix" => 'option',
], function () {
    Route::get('index', [Dashboard\OptionController::class, 'index']);
    Route::post('type/{type}/store', [Dashboard\OptionController::class, 'store']);
    Route::post('{option}/update', [Dashboard\OptionController::class, 'update']);
    Route::delete('{option}/delete', [Dashboard\OptionController::class, 'destroy']);
});


Route::group([
    "prefix" => 'award',
], function () {
    Route::get('index', [Dashboard\AwardController::class, 'index']);
    Route::post('store', [Dashboard\AwardController::class, 'store']);
    Route::get('{award}/show', [Dashboard\AwardController::class, 'show']);
    Route::post('{award}/update', [Dashboard\AwardController::class, 'update']);
    Route::delete('{award}/delete', [Dashboard\AwardController::class, 'destroy']);
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


Route::group([
    "prefix" => 'comment',
], function () {
    Route::get('index', [Dashboard\CommentController::class, 'index']);
    Route::get('{comment}/show', [Dashboard\CommentController::class, 'show']);

    Route::delete('{comment}/delete', [Dashboard\CommentController::class, 'destroy']);
});


Route::group([
    "prefix" => 'visitType',
], function () {
    Route::get('index', [Dashboard\VisitTypeController::class, 'index']);
});



Route::group([
    "prefix" => 'user',
], function () {
    Route::get('getAllRequestHost', [Dashboard\UserController::class, 'getAllRequestHost']);
    Route::post('approveRequestHost/{user}', [Dashboard\UserController::class, 'approveRequestHost']);
    Route::post('rejectRequestHost/{user}', [Dashboard\UserController::class, 'rejectRequestHost']);
});

Route::group([
    "prefix" => 'notification',
], function () {
    Route::get('index', [Dashboard\NotificationController::class, 'index']);
    Route::get('{notification}/show', [Dashboard\NotificationController::class, 'show']);
    
    Route::post('store', [Dashboard\NotificationController::class, 'store']);
    Route::post('{notification}/update', [Dashboard\NotificationController::class, 'update']);
    Route::delete('{notification}/delete', [Dashboard\NotificationController::class, 'destroy']);
});