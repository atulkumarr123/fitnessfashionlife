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


Route::get('about', 'PagesController@about');
Route::get('talkToUs', 'PagesController@talkToUs');
Route::get('/','ArticlesController@index');
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
Route::get('articles/{id}','ArticlesController@show');
Route::get('articles/{id}/edit','ArticlesController@edit');
Route::post('articles','ArticlesController@store');
Route::patch('articles/{id}','ArticlesController@update');
Route::get('articles/filter/{category}', 'ArticlesControllerForCustomOperations@filterArticlesBasedOnCategory');
Route::get('search', 'ArticlesControllerForCustomOperations@search');
//Route:resource('articles', 'ArticlesController');