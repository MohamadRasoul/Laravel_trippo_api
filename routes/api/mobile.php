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
    Route::get('indexwithSearch', [Mobile\PlaceController::class, 'indexwithSearch']);
    // Route::get('indexTrending', [Mobile\PlaceController::class, 'indexTrending']);
    Route::get('{place}/image/index', [Mobile\PlaceController::class, 'indexImage']);
    Route::get('{place}/show', [Mobile\PlaceController::class, 'show']);
    Route::get('place_by_point_map', [Mobile\PlaceController::class, 'getPlacesWithPointMap']);

    Route::post('{place}/image/store', [Mobile\PlaceController::class, 'addImage']);
    Route::get('topAttractionPlaces', [Mobile\PlaceController::class, 'topAttractionPlaces']);
    Route::get('youMightLikePlaces', [Mobile\PlaceController::class, 'youMightLikePlaces']);
    Route::get('nearBy5km', [Mobile\PlaceController::class, 'nearBy5km']);
});


Route::group([
    "prefix" => 'comment',
], function () {
    Route::get('/place/{place}/index', [Mobile\CommentController::class, 'indexByPlace']);
    Route::get('/experience/{experience}/index', [Mobile\CommentController::class, 'indexByExperience']);
    Route::get('{comment}/show', [Mobile\CommentController::class, 'show']);

    Route::post('place/{place}/store', [Mobile\CommentController::class, 'storePlaceComment']);
    Route::post('experience/{experience}/store', [Mobile\CommentController::class, 'storeExperienceComment']);
});

Route::group([
    "prefix" => 'visitType',
], function () {
    Route::get('index', [Mobile\VisitTypeController::class, 'index']);
});

Route::group([
    "prefix" => 'plan',
], function () {
    Route::get('index', [Mobile\PlanController::class, 'index']);
    Route::get('user/index', [Mobile\PlanController::class, 'indexByUser']);
    Route::get('{plan}/show', [Mobile\PlanController::class, 'show']);

    Route::post('store', [Mobile\PlanController::class, 'store']);
    Route::post('{plan}/update', [Mobile\PlanController::class, 'update']);
    Route::delete('{plan}/delete', [Mobile\PlanController::class, 'destroy']);
});

Route::group([
    "prefix" => 'planContent',
], function () {
    Route::get('plan/{plan}/index', [Mobile\PlanContentController::class, 'indexByPlan']);
    Route::get('{planContent}/show', [Mobile\PlanContentController::class, 'show']);

    Route::post('plan/{plan}/store', [Mobile\PlanContentController::class, 'store']);
    Route::post('{planContent}/update', [Mobile\PlanContentController::class, 'update']);
    Route::delete('{planContent}/delete', [Mobile\PlanContentController::class, 'destroy']);
});


Route::group([
    "prefix" => 'experience',
], function () {
    Route::get('index', [Mobile\ExperienceController::class, 'index']);
    Route::get('{experience}/show', [Mobile\ExperienceController::class, 'show']);

    Route::post('store', [Mobile\ExperienceController::class, 'store']);
    Route::post('{experience}/update', [Mobile\ExperienceController::class, 'update']);
    Route::delete('{experience}/delete', [Mobile\ExperienceController::class, 'destroy']);
});

















Route::group([
    "prefix" => 'favourite',
], function () {
    Route::get('index', [Mobile\FavouritePlaceController::class, 'index']);
    Route::post('{place_id}/changeStatus', [Mobile\FavouritePlaceController::class, 'changeStatus']);
});


Route::group([
    "prefix" => 'user',
], function () {
    Route::post('requestHost', [Mobile\UserController::class, 'requestHost']);
});