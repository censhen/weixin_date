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

// frontend
Route::get('/apply', 'FrontendController@getApply');
Route::post('/apply', 'FrontendController@postApply');

// backend
Route::get('/backend/show', 'BackendController@getShowAll');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');