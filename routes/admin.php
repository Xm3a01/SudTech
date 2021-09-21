<?php

use Illuminate\Support\Facades\Route;


Route::get('login/form', 'Auth\AdminLoginController@showLoginForm')->name('admins.login.form');
Route::post('login', 'Auth\AdminLoginController@login')->name('admins.login');
Route::get('logout', 'Auth\AdminLoginController@logout')->name('admins.logout');


Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'Dashboard\Admin\IndexController@index')->name('admins.dashboard');
    Route::get('getData', 'Dashboard\Admin\JobController@getDate')->name('admins.getDate');
    Route::get('getTrashData', 'Dashboard\Admin\TrashController@getTrashData')->name('admins.getTrashData');
    Route::get('account/setting', 'Dashboard\Admin\UserController@acount')->name('admins.account.setting');
    Route::post('editUser/{id}', 'Dashboard\Admin\UserController@editUser')->name('admins.editUser');
    Route::resource('jobs', 'Dashboard\Admin\JobController')->except('update');
    Route::post('jobs/update/{id}', 'Dashboard\Admin\JobController@update')->name('admins.job.update');
    Route::resource('trash', 'Dashboard\Admin\TrashController');
    Route::resource('users', 'Dashboard\Admin\UserController');
    Route::post('users/update/{user}', 'Dashboard\Admin\UserController@update')->name('admins.users.update');
    Route::resource('tags', 'Dashboard\Admin\TagController')->except('update');
    Route::post('tags/update/{tag}', 'Dashboard\Admin\TagController@update')->name('admins.tags.update');
    Route::get('tag/paginate', 'Dashboard\Admin\TagController@paginate')->name('admins.tag.paginate');
    Route::get('users/paginate', 'Dashboard\Admin\UserController@paginate')->name('admins.users.paginate');
});
