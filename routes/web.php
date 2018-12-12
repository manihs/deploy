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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/interest-selection', 'SignupController@phaseone')->name('phaseone');

Route::post('/interest-selection/query', 'SignupController@fetch_interest')->name('interest.fetch');

Route::post('/interest-selection/all', 'SignupController@all_interest')->name('interest.all');

Route::post('/interest-selection/add', 'SignupController@add_interest')->name('interest.add');

Route::post('/interest-selection/add', 'SignupController@remove_interest')->name('interest.remove');




