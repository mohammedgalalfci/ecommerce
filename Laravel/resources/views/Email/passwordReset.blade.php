@component('mail::message')
# Change password Request

Click on the button below to change password

@component('mail::button', ['url' => 'https://samaaehab.github.io/Ecommerce/response-reset?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
