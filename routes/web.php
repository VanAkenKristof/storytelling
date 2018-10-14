<?php


Auth::routes();

Route::get('/', 'StoryController@index')->name('index');


Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['auth.user'])->group(function () {
        //
    });

    Route::middleware(['auth.user'])->group(function () {
        //
    });
});


