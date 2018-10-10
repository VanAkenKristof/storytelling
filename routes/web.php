<?php


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['auth.user'])->group(function () {
        Route::get('/', 'StoryController@index')->name('index');
    });

    Route::middleware(['auth.user'])->group(function () {

    });
});


