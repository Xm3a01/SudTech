<?php


namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobService {

    public function createNewJob($request)
    {
        
        Job::create([
            'job_title' => $request->job_title,
            'job_location' => $request->job_location,
            'job_description' => $request->job_description,
            'company_name' => $request->company_name,
            'apply_url' => $request->apply_url,
            'apply_email' => $request->apply_email,
            'job_responspilty' => $request->job_responsibilities,
            'job_requirements' => $request->job_requirements,
            'job_color' => $request->job_color,
            'user_id' => Auth::user()->is_admin == 1 ? $request->user_id : Auth::user()->id 
        ]);
    }

    public function updateJob($job , $request)
    {

           $job->status = $request->status;
          if ($request->has('job_title')) {
              $job->job_title = $request->job_title;
          }
          if ($request->has('job_location')) {
              $job->job_location = $request->job_location;
          }
          if ($request->has('job_description')) {
              $job->job_description = $request->job_description;
          }
          if ($request->has('company_name')) {
              $job->company_name = $request->company_name;
          }
          if ($request->has('apply_url')) {
              $job->apply_url = $request->apply_url;
          }
          if ($request->has('apply_email')) {
              $job->apply_email = $request->apply_email;
          }
          if ($request->has('job_responsibilities')) {
              $job->job_responspilty = $request->job_responsibilities;
          }
          if ($request->has('job_requirements')) {
              $job->job_requirements = $request->job_requirements;
          }
          if ($request->has('job_color')) {
              $job->job_color = $request->job_color;
          }
            $job->save();
    }
}