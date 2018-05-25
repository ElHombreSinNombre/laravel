@component('dashboard/index')
    @section('title')
        Depósito Aduanero
    @stop
    @slot('header')
        @include('moduloDepositoAduanero.partials.header')
    @endslot
    @slot('sidebar')
        @include('moduloDepositoAduanero.partials.sidebar')
    @endslot
@endcomponent
