@component('mail::message')
# Change password Request

Click on the button below to change password

@component('mail::button', ['url' => 'http://localhost:4200/reset-password?token='.$token])
Reset Password
@endcomponent
nada
Thanks,<br>
{{ config('app.name') }}
@endcomponent
