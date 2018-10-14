<?php


Auth::routes();

Route::get('/', 'StoryController@index')->name('storytelling.index');
Route::get('/list', 'StoryController@list')->name('storytelling.list');


Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['auth.user'])->group(function () {
        //
    });

    Route::middleware(['auth.user'])->group(function () {
        //
    });
});


