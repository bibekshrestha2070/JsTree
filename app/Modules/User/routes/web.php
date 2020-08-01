<?php

Route::group(['middleware' => ['web','auth']], function () {
    
    Route::group(['prefix' => 'users'], function () {
        Route::get('/','UserController@index')->name('user.index');
        Route::get('/users-data-ajax','UserController@fetchUsersAjax');
        Route::get('/add','UserController@create')->name('user.add');
        Route::get('/edit/{id}','UserController@edit')->name('edit.user');
        Route::post('/store','UserController@store')->name('store.user');
        Route::post('/update/{id}','UserController@update')->name('update.user');
        Route::any('/delete/{id}','UserController@delete')->name('delete.user');

    });
});
