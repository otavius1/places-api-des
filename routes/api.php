<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

Route::apiResource('places', PlaceController::class);

Route::get('/places/slug/{slug}', [PlaceController::class, 'showBySlug']);