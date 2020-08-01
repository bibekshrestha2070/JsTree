<?php

Route::group(['middleware' => ['web','auth','role:admin']], function () {

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/','RoleController@index')->name('role.index');
        Route::get('/add','RoleController@create')->name('role.add');
        Route::get('/edit/{id}','RoleController@edit')->name('edit.role');
        Route::post('/store','RoleController@store')->name('store.role');
        Route::post('/update/{id}','RoleController@update')->name('update.role');

    });
});
