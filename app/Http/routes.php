<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');
    Route::get('/places/{id}/showaddphoto', 'PlacesController@showAddPhoto');
    Route::get('/places/{id}/showaddtext', 'PlacesController@showAddText');
    Route::post('/places/{id}/addtext', 'PlacesController@addText');
    Route::post('/places/{id}/addphoto', 'PlacesController@addPhoto');
    Route::get('/places/{id}/togglevisibility', 'PlacesController@toggleVisibility');
    Route::resource('/places', "PlacesController");
    Route::resource('/user', "UserController");
    Route::controller('/friends', "FriendsController");

    Route::get('/home', 'HomeController@index');
});
