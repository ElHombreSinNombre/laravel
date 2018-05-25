@component('dashboard/index')
    @section('title')
        Administración del sistema
    @stop
    @slot('header')
        @include('moduloAdministracion.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloAdministracion.partials.sidebar')
    @endslot
@endcomponent
