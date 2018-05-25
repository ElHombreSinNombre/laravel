@component('mail::message')
## Listado de estancias.

@component('mail::table_estancias', ['variable' => $estancias])
@endcomponent

@component('mail::footer', ['footer' => $footer])
@endcomponent

@endcomponent