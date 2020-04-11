<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/', 'HomeController@store')->name('home.store');

Auth::routes();
