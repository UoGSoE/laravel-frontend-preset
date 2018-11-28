<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::view('/', 'welcome');

    Route::impersonate(); // https: //github.com/404labfr/laravel-impersonate

    Route::group(['middleware' => 'admin', 'prefix' => '/admin'], function () {
    });
});
