@component('dashboard/index')
    @section('title')
        Movimiento de trenes
    @stop
    @slot('header')
        @include('moduloMovimientoTrenes.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloMovimientoTrenes.partials.sidebar')
    @endslot
@endcomponent
