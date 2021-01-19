<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReplyController;
use App\Http\Controllers\Api\ReplyLikeController;
use App\Http\Controllers\Api\ReplyReplyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::post('post/{post}/like', [LikeController::class, 'store']);
Route::delete('post/{post}/like', [LikeController::class, 'destroy']);

Route::post('post/{post}/reply/{reply}/like', [ReplyLikeController::class, 'store']);
Route::delete('post/{post}/reply/{reply}/like', [ReplyLikeController::class, 'destroy']);

Route::apiResource('category', CategoryController::class);
Route::apiResource('post', PostController::class);
Route::apiResource('post/{post}/reply', ReplyController::class);
Route::apiResource('post/{post}/reply/{reply}/reply_reply', ReplyReplyController::class);


Route::group(['prefix' => 'auth'], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('sign-up', [AuthController::class, 'signUp']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
