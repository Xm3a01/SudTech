<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Models\Job;
use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('jobs');
        $jobs = $user->jobs()->paginate(10);
        return Inertia::render('Dashboard/Job/Index',['user' => $user , 'jobs' => $jobs]);
    }

    public function create()
    {
        $tags = Tag::all();
        $user = Auth::user();
        return Inertia::render('Dashboard/Job/Create',['tags' => $tags , 'user' => $user]);
    }

    public function store(Request $request)
    {
        $t_id = array_map('intval' , explode( ',' , $request->inputTags));    
        $this->jobValidation($request);
        
        $job = $this->storeJob($request);
        $job->tags()->sync($t_id);


        if($request->segment(2) == 'jobs'){
            return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully added');
         } else {
            return redirect()->back()->with('successMessage' , 'Your Job Successfully added');
         }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $job = Job::findOrFail($id)->load('tags');
        return Inertia::render('Dashboard/Job/Edit',['job' => $job , 'user' => $user]);
    }

    public function update(Request $request, $id)
    {


        $job = Job::findOrFail($id);

           $job->status = $request->status;
          if ($request->job_title) {
              $job->job_title = $request->job_title;
          }
          if ($request->job_location) {
              $job->job_location = $request->job_location;
          }
          if ($request->job_description) {
              $job->job_description = $request->job_description;
          }
          if ($request->company_name) {
              $job->company_name = $request->company_name;
          }
          if ($request->apply_url) {
              $job->apply_url = $request->apply_url;
          }
          if ($request->apply_email) {
              $job->apply_email = $request->apply_email;
          }
          if ($request->job_responsibilities) {
              $job->job_responspilty = $request->job_responsibilities;
          }
          if ($request->job_requirements) {
              $job->job_requirements = $request->job_requirements;
          }
          if ($request->job_color) {
              $job->job_color = $request->job_color;
          }
            $job->save();
        // if($request->segment(1) == 'jobs'){
           return redirect()->route('jobs.index')->with('successMessage' , 'Your Job Successfully updated');
        
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return back()->with('successMessage','deleted done !');
    }

    public function storeJob($request)
    {
        return Job::create([
            'job_title' => $request->job_title,
            'job_location' => $request->job_location,
            'job_description' => $request->job_description,
            'company_name' => $request->company_name,
            'apply_url' => $request->apply_url,
            'apply_email' => $request->apply_email,
            'job_responspilty' => $request->job_responsibilities,
            'job_requirements' => $request->job_requirements,
            'job_color' => $request->job_color,
            'user_id' => Auth::user()->id
        ]);
    }

    public function jobValidation($request)
    {
        $this->validate($request ,  [
            'job_title' => 'required',
            'job_location' => 'required',
            'company_name' => 'required',
            'job_description' => 'required',
            // 'job_tags' => 'required'
        ]);
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
