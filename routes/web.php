<?php

Auth::routes();

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('home');

Route::post('create/card', 'CardController@create')->name('create.card');

Route::get('tags/find', 'TagController@search');

Route::get('autocomplete/user/name', 'TagController@search');



