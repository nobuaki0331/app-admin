<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PrefectureController;


Route::group(['middleware' => ['auth:api']], function(){
    Route::get('user', [HomeController::class, 'index']);
    Route::get('side-menus', [HomeController::class, 'sideMenu']);
    Route::get('log/playlog', [LogController::class, 'play']);
    Route::resource('account', UserController::class, ['except' => ['create', 'destroy']]);
    Route::delete('account', [UserController::class, 'destroy']);
    Route::get('account-search', [UserController::class, 'search']);
    Route::post('contact', [ContactController::class, 'store']);
    // 画像保存用api
    Route::post('image', [ImageController::class, 'store']);
    Route::get('prefectures', [PrefectureController::class, 'getPrefecture']);
});

