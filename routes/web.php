<?php

use App\User;
use App\Models\Job;
use App\Models\Tag;
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

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/login', 'HomeController@login')->name('login');
// Route::get('/register', 'HomeController@register')->name('register');
Route::get('/job/show', 'JobController@show')->name('job.show');
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function () {

    Route::get('/', 'Dashboard\IndexController@index')->name('dashboard');
    Route::resource('jobs', 'Dashboard\JobController');
    Route::resource('users', 'Dashboard\UserController');
});
Route::get('email', 'Dashboard\MailController@index')->name('email');

Route::any('jobs', function () {
    $job = Job::where('id',2)->first();
    // $tags = Tag::all();

    // $job->tags()->sync($tags);
    dd($job->tags);
    // $a = [];
    // foreach ($job->tags as $key => $value) {
    //     $a =$value;
    // }

    // return $a;
});
