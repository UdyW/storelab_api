<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'task', 'middleware'=>['auth', 'json']], function($router){
    Route::post('/', 'TaskController@store');
    Route::get('/{id}', 'TaskController@retrieve');
    Route::put('/{id}', 'TaskController@update');
    Route::delete('/{id}', 'TaskController@remove');

    Route::group(['prefix'=>'user', 'middleware'=>['json']], function($router){
        Route::post('/{id}', 'TaskUserController@store');
        Route::get('/{filter}/{id}', 'TaskUserController@retrieve');
        Route::put('/{id}', 'TaskUserController@update');
        Route::delete('/{id}', 'TaskUserController@remove');
    });
});




Route::group(['prefix' => 'auth'], function($router) {
    Route::post('login', ['uses' => 'AuthController@login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', ['uses' => 'AuthController@me']);
});

