<?php


Route::group(['middleware' => ['web','auth']], function () {

    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/get-permissions','PermissionController@getPermissions')->name('permissions.get');
    });
});

Route::group(['middleware' => ['web','auth','role:admin']], function () {

    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/','PermissionController@index')->name('permission.index');
        Route::get('/add','PermissionController@create')->name('permission.add');
        Route::get('/edit/{id}','PermissionController@edit')->name('edit.permission');
        Route::post('/store','PermissionController@store')->name('store.permission');
        Route::post('/update/{id}','PermissionController@update')->name('update.permission');

    });
});