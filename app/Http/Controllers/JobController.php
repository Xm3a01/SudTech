<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function create()
    {
        return Inertia::render('App/CreateJob');
    }

    public function show()
    {
        return Inertia::render('App/ShowJob');
    }
}
