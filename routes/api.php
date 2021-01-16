<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('category', \App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('post', \App\Http\Controllers\Api\PostController::class);
Route::apiResource('post/{post}/reply', \App\Http\Controllers\Api\ReplyController::class);
Route::apiResource('post/{post}/reply/{reply}/reply_reply', \App\Http\Controllers\Api\ReplyReplyController::class);
