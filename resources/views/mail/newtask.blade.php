@component('mail::message')
<b>Hello!</b>
<br><br>
You have a new task to do!
<br><br>
Assigned By: {{$task->owner->name}}
<br><br>

@php $url = env('app_url').'/tasks'; @endphp
Check your task <a href="{{$url}}">here.</a>
<br><br>
Regards,<br>
Fresh Application
@endcomponent