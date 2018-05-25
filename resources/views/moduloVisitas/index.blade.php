@component('dashboard/index')
    @section('title')
        Control de visitas
    @stop
    @slot('header')
        @include('moduloVisitas.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloVisitas.partials.sidebar')
    @endslot
@endcomponent
