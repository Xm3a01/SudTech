<?php

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    Route::resource('cvs', 'Dashboard\CvController');
    Route::resource('jobs', 'Dashboard\JobController');
    Route::resource('users', 'Dashboard\UserController');
});
