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
        $user = Auth::user();
        return Inertia::render('Dashboard/Job/Index',['user' => $user]);
    }

    public function create()
    {
        $tags = Tag::all();
        $user = Auth::user();
        return Inertia::render('Dashboard/Job/Create',['tags' => $tags , 'user' => $user]);
    }

    public function store(Request $request)
    {
        // Job::create([
        //     'name' => $request->logo->storeAs('mo','public/app')
        // ]);
        return $request->logo->getCLientOriginalName();
        /* custom validation */
        $this->jobValidation($request);

        /* this for rollback all job & tags when some error occur */
        DB::transaction();

          try{
            $job = $this->storeJob($request);
            $job->tags()->attach($request->tags);

        DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
            'job_responspilty' => $request->job_responspilty,
            'job_requirements' => $request->job_requirements,
            'job_color' => $request->job_color
        ]);
    }

    public function jobValidation($request)
    {
        $this->validate($request ,  [
            'job_title' => 'required',
            'job_location' => 'required',
            'company_name' => 'required',
            'job_description' => 'required',
            'apply_url' => 'sometimes',
            'apply_email' => 'sometimes',
            'job_tags' => 'required'
        ]);
    }
}
