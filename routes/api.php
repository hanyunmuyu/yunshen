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
    //校园社团列表
    Route::get('/school/community', 'SchoolController@communityList');
    //校园 校友
    Route::get('/school/student', 'SchoolController@studentList');
    //社团列表
    Route::get('/community', 'CommunityController@index');
    //获得社团的分类
    Route::get('/community/category', 'CommunityController@getCommunityCategory');
    //图片上传
    Route::post('/upload', 'UploadController@upload');
    //社团详情
    Route::get('/community/detail', 'CommunityController@detail');
    //用户列表
    Route::get('/user', 'UserController@index');
    Route::group(['middleware' => ['api.auth']], function () {
        //关注社团
        Route::post('/community/attention', 'CommunityController@attention');
        //社团签到
        Route::post('/community/sign', 'CommunityController@sign');
        //创建社团
        Route::post('/community/create', 'CommunityController@createCategory');
    });
});
