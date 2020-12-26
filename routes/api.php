<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HogeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['api']], function(){
    Route::get('hoge', [HogeController::class, 'index']);
    Route::get('log/playlog', [LogController::class, 'play']);
    Route::get('account', [UserController::class, 'index']);
});
