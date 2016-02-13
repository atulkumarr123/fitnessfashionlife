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
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
Route::post('articles','ArticlesController@store');
Route::patch('articles/{id}','ArticlesController@update');
Route::get('articles/{id}','ArticlesController@show');
Route::get('articles/{id}/edit','ArticlesController@edit');
Route::get('articles/filter/{category}', 'ArticlesControllerForCustomOperations@filterArticlesBasedOnCategory');

//Route:resource('articles', 'ArticlesController');