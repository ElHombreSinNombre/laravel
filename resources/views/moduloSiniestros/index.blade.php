@component('dashboard/index')
    @section('title')
        Control de siniestros
    @stop
    @slot('header')
        @include('moduloSiniestros.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloSiniestros.partials.sidebar')
    @endslot
@endcomponent
