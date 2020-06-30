<?php

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


Route::get('/dashboard/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/dashboard/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/register', 'HomeController@register')->name('register');
Route::get('/job/show', 'JobController@show')->name('job.show');
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function () {

    Route::get('/', 'Dashboard\IndexController@index')->name('dashboard');
    Route::resource('jobs', 'Dashboard\JobController');
    Route::resource('users', 'Dashboard\UserController');
});

Route::any('email', function () {
    // try{
    // \Mail::to('mohamed29w@gmail.com')->send(new SendJob());
    // return "Done";
    // } catch(Exception $e) {
    //     return $e->getMessage();
    // }

    return new SendJob();
});
