<?php

use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    return $request->user();
});