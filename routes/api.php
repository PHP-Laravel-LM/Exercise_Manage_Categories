<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('category/{id}', 'ControllerCategory@getCategory');
Route::post('category', 'ControllerCategory@createCategory');
Route::put('category/{id}', 'ControllerCategory@updateCategory');
Route::delete('category/{id}', 'ControllerCategory@deleteCategory');
