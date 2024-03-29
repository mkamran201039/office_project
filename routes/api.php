<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Example routes
//Route::apiResource('user', App\Http\Controllers\UserController::class);



Route::get('/index', 'App\Http\Controllers\UserController@index');
Route::get('/index2/{id}', 'App\Http\Controllers\UserController@index2');
Route::post('/store', 'App\Http\Controllers\UserController@store');
Route::post('/store2', 'App\Http\Controllers\UserController@store2');
Route::put('/update/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/delete/{id}', 'App\Http\Controllers\UserController@destroy');
