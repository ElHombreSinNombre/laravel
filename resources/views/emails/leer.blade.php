@component('mail::message')
## No existe el buque {{$buque}}.

@component('mail::footer', ['footer' => $footer])
@endcomponent

@endcomponent