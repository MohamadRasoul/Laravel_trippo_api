<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Dashboard\CityController;
use App\Http\Controllers\Api\Dashboard\QuestionController;
use App\Http\Controllers\Api\Dashboard\AnswerController;




Route::group([
    "prefix"     => 'city',
    "controller" => CityController::class
], function () {
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::get('{city}/show', 'show');
    Route::post('{city}/update', 'update');
    Route::delete('{city}/delete', 'destroy');
});


Route::group([
    "prefix"     => 'question',
    "controller" => QuestionController::class
], function () {
    Route::get('city/{city}/index', 'indexByCity');
    Route::get('{question}/show', 'show');
    Route::delete('{question}/delete', 'destroy');
});

Route::group([
    "prefix"     => 'answer',
    "controller" => AnswerController::class
], function () {
    Route::delete('{answer}/delete', 'destroy');
});





