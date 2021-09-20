<?php


namespace App\Services;

use App\Models\Job;
use App\Events\SendEmail;
use App\Traits\AttachmentTrait;
use Illuminate\Support\Facades\Auth;

class JobService {

    use AttachmentTrait;

    public function createNewJob($request)
    {

        $job = Job::create([
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

        $tage_id = array_map('intval' , explode( ',' , $request->inputTags));

        if ($this->request->hasFile('logo')) {
            $this->singleFile($request->logo , $job , 'jobs');
        }
        $job->tags()->sync($tage_id);

        event( new SendEmail($job));
    }

    public function updateJob($job , $request)
    {
        // dd($request->status);
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
          if ($request->has('job_responspilty')) {
              $job->job_responspilty = $request->job_responspilty;
          }
          if ($request->has('job_requirements')) {
              $job->job_requirements = $request->job_requirements;
          }
          if ($request->has('job_color')) {
              $job->job_color = $request->job_color;
          }
          if($request->has('tags')) {
            $tage_id = array_map('intval' , explode( ',' , $request->tags));
            $job->tags()->sync($tage_id);
          }
            $job->save();

            if ($request->hasFile('logo')) {
                $job->clearMediaCollection('jobs');
                // $job->addMedia($this->request->logo)->preservingOriginal()->toMediaCollection('jobs');
                $this->singleFile($request->logo , $job , 'jobs');
            }
    }
}
