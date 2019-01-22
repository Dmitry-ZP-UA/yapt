<?php

Auth::routes();

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'CardController@show')->name('home')->middleware('auth');;

Route::post('create/card', 'CardController@create')->name('create.card');

Route::post('create/comment', 'CommentController@create')->name('create.comment');

Route::get('tags/find', 'TagController@search');

Route::get('autocomplete/user/name', 'TagController@search');



