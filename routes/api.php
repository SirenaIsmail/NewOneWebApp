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


//done
Route::middleware('auth:sanctum')->group(function (){

    //users
    Route::get('/user_index', 'App\Http\Controllers\UserController@index');
    Route::get('/user_show/{id}', 'App\Http\Controllers\UserController@show');
    Route::get('/user_delete/{id}', 'App\Http\Controllers\UserController@destroy');

    //files
    Route::get('/file_index', 'App\Http\Controllers\FileController@index');
    Route::post('/file_store', 'App\Http\Controllers\FileController@store');
    Route::get('/file_download', 'App\Http\Controllers\FileController@getDownload');
    Route::get('/file_show/{id}', 'App\Http\Controllers\FileController@show');
    Route::get('/file_delete/{id}', 'App\Http\Controllers\FileController@destroy');
    Route::put('/checkIn/{id}', 'App\Http\Controllers\FileController@checkIn');
    Route::put('/checkOut/{id}', 'App\Http\Controllers\FileController@checkOut');

    ////group
    Route::get('/group_index', 'App\Http\Controllers\GroupController@index');
    Route::post('/group_store', 'App\Http\Controllers\GroupController@store');
    Route::get('/group_show/{id}', 'App\Http\Controllers\GroupController@show');
    Route::get('/group_delete/{id}', 'App\Http\Controllers\GroupController@destroy');



    Route::post('/add_Member', 'App\Http\Controllers\MemberController@store');


    Route::post('/add_GroupFile', 'App\Http\Controllers\GroupFileController@store');

});






    Route::post('/file_store2', 'App\Http\Controllers\FileController@store2');
    Route::get('/file_update/{id}', 'App\Http\Controllers\FileController@update');


    Route::get('/group_update/{id}', 'App\Http\Controllers\GroupController@update');
