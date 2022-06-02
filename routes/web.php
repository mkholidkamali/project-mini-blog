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
    Route::post('/d/store', 'store')->name('dashboard.store');
    Route::get('/d/{post}/edit', 'edit')->name('dashboard.edit');
    Route::patch('/d/{post}/update', 'update')->name('dashboard.update');
    Route::delete('/d/{post}/destroy', 'destroy')->name('dashboard.destroy');
});