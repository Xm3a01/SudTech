@component('mail::message')
# New job poated

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

{{-- @component('mail::button', ['class'=>'button-success','url' => ''])
Check
@endcomponent --}}
<a href="">
<div class="job-section">
    <div >
      <p> <img src="{{asset('images/search.png')}}" class="image"> <span style="margin-left: 10px; text-decoration: none;"> web Developer</span> </p>
    </div>
</div>
</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
