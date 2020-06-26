<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SUDTECH')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
SUD<span class="text-red-500">TE</span>CH
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
