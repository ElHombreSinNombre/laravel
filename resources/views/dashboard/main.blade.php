<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="icon" href="{{asset('img/logo.ico')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/adminlte.css') }}" />
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}" />
    @yield('styles')
</head>
<body class="skin-black sidebar-mini">
    <div id="app">
        <div class="wrapper">
            <div class="content-wrapper">
                <section>
                     @yield('content')
                </section>
            </div>
             @include('dashboard.partials.footer')
        </div>
    </div>
  <script src="{{asset('/js/jquery.js') }}" type="text/javascript"></script> 
  <script src="{{asset('/js/bootstrap.js')}}" type="text/javascript"></script> 
  <script src="{{asset('/js/adminlte.js') }}" type="text/javascript"></script>
  <script src="{{asset('/js/partials/moment.js') }}" type="text/javascript"></script>
  <script src="{{asset('/js/partials/locale.js') }}" type="text/javascript"></script>
  <script src="{{asset('/js/partials/main.js') }}" type="text/javascript"></script>
  @yield('javascript')
</body>
</html>