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

        $olders =  Job::where('created_at' ,'<=', Carbon::now()->subWeeks(4)->addDays(2))->get();
        $newers =  Job::where('created_at' ,'>', Carbon::now()->subWeeks(4)->addDays(2))->get();
        //delete
         Job::where('created_at' ,'<', Carbon::now()->subWeeks(8)->addDays(4))->delete();

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
