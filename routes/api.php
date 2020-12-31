<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


Route::group(['middleware' => ['auth:api']], function(){
    Route::get('user', [HomeController::class, 'index']);
    Route::get('log/playlog', [LogController::class, 'play']);
    Route::resource('account', UserController::class, ['except' => ['create', 'destroy']]);
    Route::delete('account', [UserController::class, 'destroy']);
    Route::get('account-search', [UserController::class, 'search']);
});
