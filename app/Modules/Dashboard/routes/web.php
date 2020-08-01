<?php

Route::group(['middleware' => ['web','auth']], function () {

    Route::group(['prefix' => 'dashboard'], function () {


        Route::get('/','DashboardController@index')->name('dashboard');


    });
});
