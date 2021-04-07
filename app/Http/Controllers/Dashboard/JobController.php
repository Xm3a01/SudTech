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
        $user['avatar'] = $user->avatar;
        if($user->is_admin == 1){
            $jobs = Job::paginate(10);
        } else {

            $jobs = $user->jobs()->paginate(10);
        }
        $jobs->load('tags');
        return Inertia::render('Dashboard/Job/Index',['user' => $user , 'jobs' => $jobs]);
    }

    public function create()
    {
        $users = '';
        
        $tags = Tag::all();
        $user = Auth::user();
        $user['avatar'] = $user->avatar;
        if($user->is_admin == 1) {
          $users = User::whereIs_admin(0)->get();
        }
        return Inertia::render('Dashboard/Job/Create',['tags' => $tags , 'user' => $user , 'users' => $users]);
    }

    public function store(JobRequest $request, JobService $jobService)
    {
        $jobService->createNewJob($request);

        return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully added');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $user['avatar'] = $user->avatar;
        $job = Job::findOrFail($id)->load('tags');
        $tags = Tag::all();
        return Inertia::render('Dashboard/Job/Edit',['job' => $job , 'user' => $user , 'tags' => $tags]);
    }

    public function update(Request $request, $id , JobService $jobService)
    {
           $job = Job::findOrFail($id);
           $user = Auth::user();
           $user['avatar'] = $user->avatar;
           $jobService->updateJob($job , $request);
           return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully updated');

    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        if($job->avatar) {
            $job->clearMediaCollection('jobs');
        }

        $job->delete();
        return back()->with('successMessage','deleted done !');
    }

    public function getDate()
    {
        $user = Auth::user();
        $user['avatar'] = $user->avatar;
        if($user->is_admin == 1){
            $jobs = Job::paginate(10);
        } else {

            $jobs = $user->jobs()->paginate(10);
        }
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
