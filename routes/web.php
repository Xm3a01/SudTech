<?php

use App\User;
use App\Models\Job;
use App\Models\Tag;
use Inertia\Inertia;
use App\Mail\SendJob;
use Illuminate\Support\Facades\Auth;
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

// Admin
Route::get('admins/login/form', 'Auth\AdminLoginController@showLoginForm')->name('admins.login.form');
Route::post('admins/login', 'Auth\AdminLoginController@login')->name('admins.login');
Route::get('admins/logout', 'Auth\AdminLoginController@logout')->name('admins.logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/job/show/{job}', 'JobController@show')->name('job.show');
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function () {

    Route::get('/', 'Dashboard\IndexController@index')->name('dashboard');
    Route::get('getData', 'Dashboard\JobController@getDate')->name('getDate');
    Route::get('getTrashData', 'Dashboard\TrashController@getTrashData')->name('getTrashData');
    Route::get('account/setting', 'Dashboard\UserController@acount')->name('account.setting');
    Route::post('editUser/{id}', 'Dashboard\UserController@editUser')->name('editUser');
    Route::resource('jobs', 'Dashboard\JobController')->except('update');
    Route::post('jobs/update/{id}', 'Dashboard\JobController@update')->name('job.update');
    Route::resource('trash', 'Dashboard\TrashController');
    Route::resource('users', 'Dashboard\UserController');
    Route::post('users/update/{user}', 'Dashboard\UserController@update')->name('users.update');
    Route::resource('tags', 'Dashboard\TagController')->except('update');
    Route::post('tags/update/{tag}', 'Dashboard\TagController@update')->name('tags.update');
    Route::get('tag/paginate', 'Dashboard\TagController@paginate')->name('tag.paginate');
    Route::get('users/paginate', 'Dashboard\UserController@paginate')->name('users.paginate');
});
Route::get('email', 'MailController@index')->name('email');

Route::group(['prefix' => 'admins/dashboard' , 'middleware' => 'auth:admin'], function () {
    Route::get('/', function () {
        return "Hi Admin";
    })->name('admins.dashboard');
});

Route::any('test', function () {
    $jobs = Job::paginate(2);
    $user = Auth::user();
    return Inertia::render('Dashboard/Client/PastJob'  , ['jobs' => $jobs , 'user' => $user]);
});
