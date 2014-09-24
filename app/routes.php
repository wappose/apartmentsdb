<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', 'UserController@postLogin');
Route::get('user/remind', 'RemindersController@getRemind');
Route::post('user/remind', 'RemindersController@postRemind');
Route::get('user/register', 'UserController@getRegister');
Route::post('user/register', 'UserController@postRegister');
Route::get('user/logout', 'UserController@getLogout');


Route::group(array('before' => 'auth'), function()
{
    Route::get('/', 'UserController@getLogin');
//    Route::get('/dashboard', 'HomeController@getIndex');
    Route::resource('properties', 'PropertiesController');
    Route::resource('people', 'PeopleController');
    Route::get('user/profile', 'UserController@getProfile');



});
