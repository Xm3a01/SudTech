<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\User;
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
        $jobs = $user->jobs()->paginate(10);
        $jobs->load('tags');

        return Inertia::render('Dashboard/Client/Job',['user' => $user , 'jobs' => $jobs]);
    }

    public function create()
    {
        $tags = Tag::all();
        return Inertia::render('Dashboard/Client/NewJob',['tags' => $tags]);
    }

    public function store(JobRequest $request, JobService $jobService)
    {
        $jobService->createNewJob($request);

        return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully added');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id)->load('tags');
        $tags = Tag::all();
        return Inertia::render('Dashboard/Client/Edit',['job' => $job  , 'tags' => $tags]);
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
        // if($job->avatar) {
        //     $job->clearMediaCollection('jobs');
        // }

        $job->delete();
        return back()->with('successMessage','deleted done !');
    }

    public function getDate()
    {
        $user = Auth::user();
       $jobs = $user->jobs()->paginate(10);
       return response()->json($jobs);
    }
}
