@component('dashboard/index')
    @section('title')
        Estadística
    @stop
    @slot('header')
        @include('moduloEstadistica.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloEstadistica.partials.sidebar')
    @endslot
@endcomponent

