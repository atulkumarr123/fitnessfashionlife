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
Route::get('policy', 'PagesController@policy');
Route::get('termsConditions', 'PagesController@termsConditions');

//Subscription Functionality
Route::post('subscribe','SubscribersController@store');
Route::post('articles/subscribe','SubscribersController@store');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
//password reset dummy page (work needs to be done)
Route::controllers([
    'password' => 'Auth\PasswordController',
]);

//Articles
Route::get('search', 'ArticlesControllerForCustomOperations@search');
Route::get('/','ArticlesController@index');
Route::get('/home','ArticlesController@index');
Route::get('articles','ArticlesController@index');
//Route::get('articles/create',['middleware' => 'auth','ArticlesController@create']);
Route::get('articles/create', ['middleware'=>'auth:create', 'uses'=>'ArticlesController@create']);
Route::post('articles','ArticlesController@store');
Route::patch('articles/{id}','ArticlesController@update');
Route::get('articles/{id}',['middleware'=>'auth:show', 'uses'=>'ArticlesController@show']);
Route::get('articles/{id}/edit',['middleware'=>'auth:edit', 'uses'=>'ArticlesController@edit']);
Route::get('articles/filter/{category}', 'ArticlesControllerForCustomOperations@filterArticlesBasedOnCategory');

//Route:resource('articles', 'ArticlesController');


