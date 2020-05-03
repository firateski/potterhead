<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Harry Routes
|--------------------------------------------------------------------------
|
| Here is where you can register harry routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "harry" middleware group.
|
*/

Route::get('/characters', 'CharactersController@index');
Route::get('/characters/{characterId}', 'CharactersController@show');
