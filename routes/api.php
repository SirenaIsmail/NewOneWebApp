<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register','App\Http\Controllers\AuthController@register');

// Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');

// });
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::delete('/logout','App\Http\Controllers\AuthController@logout')->middleware('auth:sanctum');

///////////////////////////////////
Route::get('/test-online', function () {
    dd('i am online ^_^');
});
// Route::post('/login',[AuthController::class,'login']);
// Route::post('/logout',[AuthController::class,'logout']);
    // Route::post('logout', 'logout');
