<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('huruf','HurufController@index');
    Route::get('huruf/quizz/hasil-test', 'HurufController@result');
    Route::get('huruf/quizz/{no?}', 'HurufController@get_quizz');
    Route::post('huruf/quizz', 'HurufController@set_quizz');
    Route::post('huruf/quizz/jawab/{no}', 'HurufController@jawab');
    Route::post('huruf/quizz/selesai', 'HurufController@selesai');
});
