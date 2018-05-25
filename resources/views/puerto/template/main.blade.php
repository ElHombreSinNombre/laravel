<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Noatum')</title>
    <link rel="icon" href="{{asset('/img/logo.ico')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css') }}">
    @yield('styles')
</head>
<body>
    @include('puerto.template.partials.header')
    @yield('content')
    @include('puerto.template.partials.footer')
    <script src="{{asset('/js/jquery.js')}}" type="text/javascript"></script> 
    <script src="{{asset('/js/bootstrap.js')}}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/moment.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/main.js') }}" type="text/javascript"></script>
    @yield('javascript')
</body>
</html>