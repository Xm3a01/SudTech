<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('App/Index');
    }

    public function login()
    {
        return Inertia::render('App/Login');
    }

    public function register()
    {
        return Inertia::render('App/Register');
    }

}
