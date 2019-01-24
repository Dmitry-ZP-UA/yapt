<?php

Auth::routes();

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'CardController@show')->name('home')->middleware('auth');;

Route::post('create/card', 'CardController@create')->name('create.card');

Route::post('delete/card', 'CardController@delete')->name('delete.card');

Route::post('create/comment', 'CommentController@create')->name('create.comment');

Route::get('statuses/find', 'StatusController@search');

Route::get('tags/find', 'TagController@search');

Route::get('roles/find', 'RoleController@search');

Route::post('card/update', 'CardController@update');

Route::get('autocomplete/user/name', 'TagController@search');



