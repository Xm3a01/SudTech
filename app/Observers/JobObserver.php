<?php

namespace App\Observers;

use App\Models\Job;
use App\Events\SendEmail;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;

class JobObserver
{
    public $request;

    public function __construct(JobRequest $request) {

        $this->request = $request;
    }
    /**
     * Handle the job "created" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function created(Job $job)
    {

        $tage_id = array_map('intval' , explode( ',' , $this->request->inputTags));     
        
        if ($this->request->hasFile('logo')) {
            $job->addMedia($this->request->logo)->preservingOriginal()->toMediaCollection('jobs');
        }
        $job->tags()->sync($tage_id);

        event( new SendEmail($job));
    }

    /**
     * Handle the job "updated" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function updated(Job $job)
    {
        if ($this->request->has('logo')) {
            $job->clearMediaCollection('jobs');
            $job->addMedia($this->request->logo)->preservingOriginal()->toMediaCollection('jobs');
        }
    }

    /**
     * Handle the job "deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function deleted(Job $job)
    {
        //
    }

    /**
     * Handle the job "restored" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function restored(Job $job)
    {
        //
    }

    /**
     * Handle the job "force deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function forceDeleted(Job $job)
    {
        //
    }
}
