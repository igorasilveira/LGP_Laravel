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

Route::get('/', 'PagesController@index');

// Admin Routes
Route::group(['middleware' => 'role:admin'], function () {

    Route::get('/admin', function () {
        return 'Welcome Admin';
    });
});

// Editor Routes (Admin has access)
Route::group(['middleware' => 'role:editor', 'middleware' => 'role:admin'], function () {

    Route::get('/editor', function () {
        return 'Welcome Editor';
    });
});

// Monitor Routes (Admin has access)
Route::group(['middleware' => 'role:monitor', 'middleware' => 'role:admin'], function () {

    Route::get('/monitor', function () {
        return 'Welcome Monitor';
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
