<?php

namespace App\Http\Controllers\Dashboard;

// use Inertia\Inertia;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Index',['user'=>$user]);
    }
}
