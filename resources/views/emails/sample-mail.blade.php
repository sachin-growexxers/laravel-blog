@component('mail::message')
# Introduction

The body of your message.
<h3>{{ $details['title'] }}</h3>
<p>
    {{ $details['body'] }} <br>
    <strong>Name : </strong> {{ $details['name'] }} <br>
    <strong>Email : </strong> {{ $details['email'] }} <br>
    <strong>Password : </strong> {{ $details['password'] }} <br>
</p>


Thanks,<br>
Team {{ config('app.name') }}
@endcomponent