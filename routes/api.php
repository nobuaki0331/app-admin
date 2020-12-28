<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HogeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;


Route::group(['middleware' => ['auth:api']], function(){
    Route::get('log/playlog', [LogController::class, 'play']);
    Route::resource('account', UserController::class);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
