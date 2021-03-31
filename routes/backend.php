<?php

use Illuminate\Support\Facades\Route;


Route::any('backend/auth', 'AuthController@show')->name('backend:auth:show');

Route::post('backend/auth', 'AuthController@store')->name('backend:auth:store');

Route::delete('backend/auth', 'AuthController@destroy')->name('backend:auth:destroy');

Route::middleware(['auth:web'])->group(function () {
    Route::get('backend', 'HomeController@show')->name('backend:home');
});
