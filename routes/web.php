<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\EpisodeController;

Route::get('/', function () {
    return Inertia::render('Main');
})->name('main');