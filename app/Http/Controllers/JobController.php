<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        return Inertia::render('App/NewJob',[
            'tags' => $tags
        ]);
    }

    public function show(Job $job)
    {
        return Inertia::render('App/ShowJob', [
            'job' => $job,
        ]);
    }
}
