@component('mail::message')
# Thanks for taking {{ config('app.name') }} for a spin!

Hey {{ $user->name }},

{{ config('app.name') }} helps you do things better. With less back and forth, you can save an average of 4+ hours a week. That’s 208 hours a year!

## Ready to get started?
So go ahead—get rolling!

Activate your account to get started.

@component('mail::button', ['url' => route('activation.activate', $token), 'color' => 'green'])
    Activate
@endcomponent

Speak soon,<br>
The {{ config('app.name') }} Team
@endcomponent
