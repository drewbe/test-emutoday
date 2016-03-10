<?php
/*
*************
The ORDER of ROUTES is critical
*/
Route::group(['middleware' => ['web']], function() {


    Route::controller('auth/password', 'Auth\PasswordController', [
        'getEmail' => 'auth.password.email',
        'getReset' => 'auth.password.reset'
    ]);

    Route::controller('auth', 'Auth\AuthController', [
      'getLogin' => 'auth.login',
      'getLogout' => 'auth.logout'
    ]);
    //watch out for match anything ROUTES

    Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'backend\UsersController@confirm']);
    Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show'] ]);

    Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'backend\PagesController@confirm']);
    Route::resource('backend/pages', 'Backend\PagesController', ['except' => ['show'] ]);

    Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
    Route::resource('backend/blog', 'Backend\BlogController');

    Route::get('backend/story/{story}/confirm', ['as' => 'backend.story.confirm', 'uses' => 'Backend\StoryController@confirm']);
    Route::resource('backend/story', 'Backend\StoryController');


    Route::get('backend/storyimages/{storyimages}/confirm', ['as' => 'backend.storyimages.confirm', 'uses' => 'backend\StoryImageController@confirm']);
    Route::resource('backend/storyimages', 'Backend\StoryImageController');



    Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);



});
