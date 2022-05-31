<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * ROUTE
 */
Auth::routes();

/**
 * PUBLIC
 */
Route::controller(PublicController::class)->group(function() {
    Route::get('/', 'index')->name('public.index');
    Route::get('/post/1/show', 'show')->name('public.show');
});
