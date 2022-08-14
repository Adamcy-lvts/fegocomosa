@component('mail::message')
<h1>Hi, {{ $member->first_name . ' ' . $member->last_name }} </h1>

@component('mail::panel')
Welcome to Fegocomosa,
Your Registration was Successful,
You are now offically member of the organization with all the privilages of membership,
Read the constitution to know about your previliages and rights as member <a class="text-blue-500" href="#">Read Constitution</a>
@endcomponent


@component('mail::button', ['url' => route('login')])
Login to your account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
