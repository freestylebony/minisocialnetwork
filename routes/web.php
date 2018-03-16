<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'UsersController@index')->middleware('Authenticated');
Route::get('users/create', 'UsersController@create')->middleware('Authenticated');
Route::post('users', 'UsersController@store');

Route::group(['middleware' => 'Authenticated'], function(){

    Route::get('/profile/{username}', 'ProfileController@profile');
    Route::get('/profile/{username}/edit', 'ProfileController@editprofile');
    Route::post('/profile/{username}', 'ProfileController@storeProfile');
    Route::resource('articles', 'ArticlesController');
    Route::resource('myarticles', 'MyArticlesController');
    Route::resource('comments', 'CommentsController');
});
   

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

