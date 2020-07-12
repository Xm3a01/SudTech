<?php

namespace App\Http\Controllers;

use Psy\Util\Str;
use Carbon\Carbon;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;

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

        $newers =  Job::where('created_at' ,'>', Carbon::now()->subWeeks(4)->subDays(2))->where('status', true)->get();
        $olders =  Job::where('created_at' ,'<', Carbon::now()->subWeeks(4)->subDays(2))->where('status', true)->get(); // 4/6/2020 - 4/7/2020
        //delete when 2 months left
         Job::where('created_at' ,'<', Carbon::now()->subWeeks(8)->subDays(4))->delete();

        return Inertia::render('App/Index',['olders' => $olders , 'newers' => $newers]);
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
