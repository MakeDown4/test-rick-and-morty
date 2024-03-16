<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\EpisodeController;

Route::get('/', [MainController::class, 'index']);

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{id}', [CharacterController::class, 'show']);

Route::get('/locations', [LocationController::class, 'index']);
Route::get('/locations/{id}', [LocationController::class, 'show']);

Route::get('/episodes', [EpisodeController::class, 'index']);
Route::get('/episodes/{id}', [EpisodeController::class, 'show']);