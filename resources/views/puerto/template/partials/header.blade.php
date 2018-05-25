<header class="main-header">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Mostrar/Ocultar Menú</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <a href="{{route('home')}}"><img class="navbar-icon navbar-left" src="img/logo.jpg" data-placement="bottom" data-toggle="tooltip" alt="Noatum" title="Noatum"></a>
                <div id="navbar" class="navbar-collapse collapse  navbar-right">
                    <div class="navbar-form" >
                        <ul class="nav navbar-nav">
                            @if(Auth::user())
                                <li class=" dropdown">
                                    <a href="#" class="navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->user_name }} </span><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </nav>
</header>