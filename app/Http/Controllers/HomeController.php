<?php

namespace App\Http\Controllers;

use Psy\Util\Str;
use Carbon\Carbon;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        $newers =  Job::where('created_at' ,'>', Carbon::now()->subWeeks(4)->subDays(2))->where('status', true)->get();
        $olders =  Job::where('created_at' ,'<=', Carbon::now()->subWeeks(4)->subDays(2))->where('status', true)->get(); // 4/6/2020 - 4/7/2020
        //delete when 2 months left
        Job::where('created_at' ,'<=', Carbon::now()->subWeeks(8)->subDays(4))->delete();

        $jobs = Job::all();

        $newers->map(function ($newer) {
            $newer['image'] = $newer->image;
            return $newer;
        });
        $olders->map(function ($older) {
            $older['image'] = $older->image;
            return $older;
        });
        $jobs->map(function ($job) {
            $job['image'] = $job->image;
            return $job;
        });

        // $new = Job::paginate(10);

        return Inertia::render('App/Index',[
            'olders' => $olders,
            'newers' => $newers,
            'user' => Auth::user(),
            // 'jobs' => $new,
        ]);
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
