<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/shortlink', [\App\Http\Controllers\ShortLinkController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('shortlink');

Route::get('/static', [\App\Http\Controllers\ShortLinkController::class, 'static'])
    ->name('static');
