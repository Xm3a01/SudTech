<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        return Inertia::render('App/NewJob',['tags' => $tags]);
    }

    public function show()
    {
        return Inertia::render('App/ShowJob');
    }
}
