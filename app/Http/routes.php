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

//Miscellaneous Functionality
Route::get('about', 'PagesController@about');
Route::get('talkToUs', 'PagesController@talkToUs');

//Subscription Functionality
Route::post('subscribe','SubscribersController@store');
Route::post('articles/subscribe','SubscribersController@store');

//Articles
Route::get('search', 'ArticlesControllerForCustomOperations@search');
Route::get('/','ArticlesController@index');
Route::get('/home','ArticlesController@index');
Route::get('articles','ArticlesController@index');
//Route::get('articles/create',['middleware' => 'auth','ArticlesController@create']);
Route::get('articles/create', ['middleware'=>'auth', 'uses'=>'ArticlesController@create']);
Route::post('articles','ArticlesController@store');
Route::patch('articles/{id}','ArticlesController@update');
Route::get('articles/{id}','ArticlesController@show');
Route::get('articles/{id}/edit','ArticlesController@edit');
Route::get('articles/filter/{category}', 'ArticlesControllerForCustomOperations@filterArticlesBasedOnCategory');

//Route:resource('articles', 'ArticlesController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//password reset dummy page (work needs to be done)
Route::controllers([
    'password' => 'Auth\PasswordController',
]);
