<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ParkingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    Route::get('/', function(){
        return 'test';
    });
    
    Route::apiResource('news', NewsController::class);
    Route::apiResource('parking', ParkingController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
