<?php

namespace App\Http\Controllers\Dashboard;

// use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $newers =  Job::where('created_at' ,'>', Carbon::now()->subWeeks(4)->subDays(2))->count();
        $olders =  Job::where('created_at' ,'<', Carbon::now()->subWeeks(4)->subDays(2))->count();
        Job::where('created_at' ,'<', Carbon::now()->subWeeks(8)->subDays(4))->delete();
        $deleted = Job::onlyTrashed()->count();

        return Inertia::render('Dashboard/Index',['user'=>$user,'olders' => $olders , 'newers' => $newers,'deleted' => $deleted]);
    }
}
