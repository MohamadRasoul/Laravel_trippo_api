<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImageController;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});




Route::group([
    "prefix"     => 'image',
], function () {
    Route::post('/upload', [ImageController::class, 'uploadImage']);
    Route::post('/uploadBase64', [ImageController::class, 'uploadImageBase64']);
    Route::delete('{image}/delete', [ImageController::class, 'destroy']);
});
