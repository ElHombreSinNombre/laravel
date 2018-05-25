{{-- Extender de dashboard --}}
@extends('dashboard.main') 
{{-- Nuevos estilos--}}
@section('styles')
@endsection
{{-- Titulo en el header --}}
{{$header}}    
{{-- Elementos del menu lateral --}}
{{$sidebar}}  
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        <div class="jumbotron">
            <h3><b>Seleccione opción en el menú</b></h3> 
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection

