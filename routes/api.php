<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('buildings/{building_id}/tasks', [BuildingController::class, 'listBuildingTasksWithComments']);

Route::apiResource('buildings', BuildingController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('comments', CommentController::class);
