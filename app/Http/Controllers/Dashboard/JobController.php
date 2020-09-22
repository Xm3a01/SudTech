<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Models\Job;
use App\Models\Tag;
use Inertia\Inertia;
use App\Services\JobService;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('jobs');
        $user['image'] = $user->image;
        $jobs = $user->jobs()->paginate(10);
        $jobs->load('tags');
        return Inertia::render('Dashboard/Job/Index',['user' => $user , 'jobs' => $jobs]);
    }

    public function create()
    {
        $tags = Tag::all();
        $user = Auth::user();
        return Inertia::render('Dashboard/Job/Create',['tags' => $tags , 'user' => $user]);
    }

    public function store(JobRequest $request, JobService $jobService)
    {
        $jobService->createNewJob($request);

        return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully added');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $job = Job::findOrFail($id)->load('tags');
        return Inertia::render('Dashboard/Job/Edit',['job' => $job , 'user' => $user]);
    }

    public function update(Request $request, $id , JobService $jobService)
    {
           $job = Job::findOrFail($id);
           $jobService->updateJob($job , $request);
           return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully updated');

    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return back()->with('successMessage','deleted done !');
    }

    public function getDate()
    {
        $user = Auth::user();
        $jobs = $user->jobs()->paginate(10);
        return response()->json($jobs);
    }

    public function getID($tags)
    {
        $tags = [];

        foreach ($tags as $key => $value) {
            $tags[$key] = Tags::where('name', $value)->first()->id;
        }
        return $tags;
    }
}
