@component('mail::message')
# Hi, {{ $details['name'] }}

{{ $details['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
