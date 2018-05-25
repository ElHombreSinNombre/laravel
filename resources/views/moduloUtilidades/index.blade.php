@component('dashboard/index')
    @section('title')
        Utilidades
    @stop
    @slot('header')
        @include('moduloUtilidades.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloUtilidades.partials.sidebar')
    @endslot
@endcomponent

