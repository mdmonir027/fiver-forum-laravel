<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReplyController;
use App\Http\Controllers\Api\ReplyLikeController;
use App\Http\Controllers\Api\ReplyReplyController;
use Illuminate\Support\Facades\Route;

Route::post('post/{post}/like', [LikeController::class, 'store']);
Route::delete('post/{post}/like/{like}', [LikeController::class, 'destroy']);

Route::post('post/{post}/reply/{reply}/like', [ReplyLikeController::class, 'store']);
Route::delete('post/{post}/reply/{reply}/like/{like}', [ReplyLikeController::class, 'destroy']);

Route::apiResource('category', CategoryController::class);
Route::apiResource('post', PostController::class);
Route::apiResource('post/{post}/reply', ReplyController::class);
Route::apiResource('post/{post}/reply/{reply}/reply_reply', ReplyReplyController::class);
