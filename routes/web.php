<?php


Auth::routes();

Route::get('/', 'StoryController@index')->name('storytelling.index');

Route::middleware(['auth.phase2'])->group(function () {
    Route::get('/list', 'StoryController@list')->name('storytelling.list');
    Route::get('/view/{story}', 'StoryController@view')->name('storytelling.view');
});


Route::middleware(['auth.phase3'])->group(function () {
    Route::get('/story/rankings', 'StoryController@rankings')->name('storytelling.rankings');
});

Route::middleware(['auth.phase4'])->group(function () {
    Route::get('/story/winner', 'StoryController@winner')->name('storytelling.winner');
});


Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['auth.user'])->group(function () {
        Route::middleware(['auth.banned'])->group(function () {

            Route::middleware(['auth.phase1'])->group(function () {

                Route::get('/story', 'StoryController@create')->name('storytelling.create');
                Route::post('/story', 'StoryController@save')->name('storytelling.save');

                Route::post('/update/{story}', 'StoryController@update')->name('storytelling.update');
            });


            Route::get('/vote/{story}', 'StoryController@vote')->name('storytelling.vote');
            Route::get('/unvote/{story}', 'StoryController@unvote')->name('storytelling.unvote');
        });
    });

    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/users', 'AdminController@users')->name('admin.users.list');
        Route::post('/users/ban/{user}', 'AdminController@banUser')->name('admin.users.ban');
        Route::get('/users/unban/{user}', 'AdminController@unbanUser')->name('admin.users.unban');

        Route::get('/settings', 'AdminController@settings')->name('admin.settings.index');
        Route::post('/settings/edit', 'AdminController@editSettings')->name('admin.settings.edit');
    });
});

