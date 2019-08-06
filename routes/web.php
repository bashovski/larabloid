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

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/edit/{user}', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/submissions/create', 'SubmissionsController@create');
Route::post('/submissions', 'SubmissionsController@store');
Route::get('/submissions/{submission}', 'SubmissionsController@show')->name('submission.show');

Route::post( '/submissions/{submission}', 'CommentsController@create' );
Route::post( '/comments/{submission}', 'CommentsController@store' );

Route::get('/comments/{submission}', 'CommentsController@index');

Route::post('/like/{submission}', 'LikesController@store' );
