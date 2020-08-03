<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::group(['middleware' => 'guest'], function () {
Route::get('/login/google', 'Auth\LoginController@signinGoogle');

Route::get('/login/google/redirect', 'Auth\LoginController@redirectGoogle');
// });

// Index
Route::group(['as' => 'index.', 'namespace' => 'Index'], function () {
    Route::get('/', 'Pages@index')->name('index');
    Route::get('/v/{vid}', 'VideoController@index');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'Pages@index')->name('index');
    Route::get('/profile', 'Pages@profile')->name('profile');
    Route::get('/settings', 'Pages@settings')->name('settings');
});

Route::post('/file-upload', 'HomeController@fileupload');

Route::domain('v.vimg.marc')->group(function () {
    Route::get('/{vid}', 'Index\VideoController@index');
});
