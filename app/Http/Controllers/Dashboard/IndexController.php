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
        $role = '';
        $user = Auth::user();
        $user['avatar'] = $user->avatar;
        $newers =  $user->jobs()->where('created_at' ,'>', Carbon::now()->subWeeks(4)->subDays(2))->count();
        $olders =  $user->jobs()->where('created_at' ,'<', Carbon::now()->subWeeks(4)->subDays(2))->count();
        $user->jobs()->where('created_at' ,'<', Carbon::now()->subWeeks(8)->subDays(4))->delete();
        $deleted = $user->jobs()->onlyTrashed()->count();

        if($user->hasRole('super-admin')) {
            $role = 'super-admin';
        }
        return Inertia::render('Dashboard/Index',[
            'user'=>$user,
            'olders' => $olders , 
            'newers' => $newers,
            'deleted' => $deleted , 
            'role' => $role
            ]);
    }
}
