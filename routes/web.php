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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();

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
