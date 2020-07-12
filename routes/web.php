<?php

use App\User;
use App\Models\Job;
use App\Models\Tag;
use Inertia\Inertia;
use App\Mail\SendJob;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/job/show', 'JobController@show')->name('job.show');
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function () {

    Route::get('/', 'Dashboard\IndexController@index')->name('dashboard');
    Route::get('getData', 'Dashboard\JobController@getDate')->name('getDate');
    Route::get('getTrashData', 'Dashboard\TrashController@getTrashData')->name('getTrashData');
    Route::post('editUser/{id}', 'Dashboard\UserController@editUser')->name('editUser');
    Route::resource('jobs', 'Dashboard\JobController')->except('update');
    Route::post('jobs/update/{id}', 'Dashboard\JobController@update')->name('job.update');
    Route::resource('trash', 'Dashboard\TrashController');
    Route::resource('users', 'Dashboard\UserController');
});
Route::get('email', 'Dashboard\MailController@index')->name('email');

// Route::any('trash', function () {
//     return Inertia::render('Dashboard/Setting/Edit');
// });
