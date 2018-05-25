@component('mail::message')
## Su visita {{$texto}} a llegado a recepción.

@component('mail::footer', ['footer' => $footer])
@endcomponent

@endcomponent