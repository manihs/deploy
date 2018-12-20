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

Route::post('/interest-selection/remove', 'SignupController@remove_interest')->name('interest.remove');

// 

Route::get('/communities-selection', 'SignupController@phasetwo')->name('phasetwo');

Route::post('/communities-selection/query', 'SignupController@fetch_communities')->name('communities.fetch');

Route::post('/communities-selection/all', 'SignupController@all_communities')->name('communities.all');

Route::post('/communities-selection/add', 'SignupController@add_communities')->name('communities.add');

Route::post('/communities-selection/remove', 'SignupController@remove_communities')->name('communities.remove');

// 

Route::get('/new/communities', 'CommunityController@new_community_form')->name('new_community_form');

Route::post('/new/communities', 'CommunityController@new_community')->name('new_community');

Route::post('/new/communities/sub', 'CommunityController@sub_community_su')->name('sub.new.comm');

// 

Route::get('/new/image/post', 'PostController@new_image_post_form')->name('new.image.post.form');

Route::post('/new/image/post', 'PostController@new_image_post')->name('new.image.post');

// 

Route::get('/new/video/post', 'PostController@new_video_post_form')->name('new.video.post.form');

Route::post('/new/video/post', 'PostController@new_video_post')->name('new.video.post');


// 
Route::post('/post/like', 'PostController@post_like')->name('post.like');

Route::post('/post/dislike', 'PostController@post_dislike')->name('post.dislike');
