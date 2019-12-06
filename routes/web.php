<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chatroom','ChatController@index');
Route::get('/messages','ChatController@getMessages');
Route::post('/messages', 'ChatController@postMessage');