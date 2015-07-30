<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// for wechat
Route::any('/wechat', 'WechatController@serve');
Route::any('/wechat/set_menu', 'WechatController@setMenu');
Route::any('/show', 'FrontendController@getShowUser');

// frontend
Route::get('/apply', 'FrontendController@getApply');
Route::post('/apply', 'FrontendController@postApply');

// backend
