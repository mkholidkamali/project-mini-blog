<?php

use App\Http\Controllers\DashboardController;
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

Route::controller(DashboardController::class)->middleware('auth')->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard.index');
    Route::get('/d/create', 'create')->name('dashboard.create');
    Route::get('/d/1/edit', 'edit')->name('dashboard.edit');
    Route::delete('/d/1/destroy', 'destroy')->name('dashboard.destroy');
});