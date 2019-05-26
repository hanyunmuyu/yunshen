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

Route::group(['prefix' => 'v1', 'namespace' => 'v1', 'middleware' => ['api']], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/register', 'RegisterController@register');
    //校园列表
    Route::get('/school', 'SchoolController@index');
    //校园详情
    Route::get('/school/detail', 'SchoolController@detail');
    //社团列表
    Route::get('/community', 'CommunityController@index');
});
