@component('mail::message')
# Create New Curse

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel')
    hello hello
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
