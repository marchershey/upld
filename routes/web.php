<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Session

//////////////////////////////////////////////////////

Auth::routes();
// Route::group(['middleware' => 'guest'], function () {
Route::get('/login/google', 'Auth\LoginController@signinGoogle');

Route::get('/login/google/redirect', 'Auth\LoginController@redirectGoogle');
// });

// Index
Route::group(['as' => 'index.', 'namespace' => 'Index'], function () {
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/clip/{id}', 'PagesController@clip')->name('clip');
    //
    Route::get('/v/{id}', 'MediaController@view')->name('view');
});

// Dashboard
// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
//     Route::get('/', 'Pages@index')->name('index');
//     Route::get('/profile', 'Pages@profile')->name('profile');
//     Route::get('/settings', 'Pages@settings')->name('settings');
// });

// Actions
Route::post('/upload/file', 'Actions\UploadController@file')->name('upload.file');
Route::post('/upload/link', 'Actions\UploadController@link')->name('upload.link');

// Source
Route::get('/direct/{id}', 'Index/MediaController@direct')->name('source');
