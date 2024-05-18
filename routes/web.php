<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('{url}', [\App\Http\Controllers\ShortLinkController::class, 'show'])
    ->middleware(['api','guest'])
    ->name('shortlink.show');
