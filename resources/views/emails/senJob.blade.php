@component('mail::message')
# {{$job->job_title}}
<small>{{$job->job_location}}</small>

{!! $job->job_description !!}


<a href="">
<div class="job-section">
    <div >
       <p> <img src="https://images.app.goo.gl/7oeVxUQPqrh8QmRT6" class="image"> <span style="margin-left: 10px; text-decoration: none;"> {{$job->job_title}} <br class="margin-left: 10px;"> {{$job->job_location}} </span> </p>
    </div>
</div>
</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
