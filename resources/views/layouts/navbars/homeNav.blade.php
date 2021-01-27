<div class="" style="">
    <nav id="menu" class="navbar navbar-expand-lg navbar-light" style="background-color: white;" >
        <div class="container-fluid">
            
            @if (Request::path()!="login" and Request::path()!="register" and Request::path()!="home" )
                <a class="navbar-brand " href="{{ url('/') }}">
                    <img  class="logo-medical collapse navbar-collapse " src="{{ asset('img/logo.png')}} " alt="Logo" >
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/#inicio') }}"><span class="fa fa-home"></span> Inicio</a>
                    </li>
    
                    @if (Request::path()!="login" and Request::path()!="register" )
                            <li class="nav-item">
                                <a class="nav-link" href="#encuentranos"><span class="fa fa-map-marker"></span> ¿Cómo llegar?</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#productos" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Linea 1</a></li>
                                    <li><a class="dropdown-item" href="#">Linea 2</a></li>
                                    <li><a class="dropdown-item" href="#">Linea 3</a></li>
                                    <li><a class="dropdown-item" href="#">Linea 4</a></li>
                                    <li><a class="dropdown-item" href="#">Linea 5</a></li>
                                    <li><a class="dropdown-item" href="#">Linea 6</a></li>            
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contáctenos</a>
                            </li>                        
                    @endif
                </ul>
                <div class="d-flex align-items-end">
                    @if (Route::has('login'))
                        @auth                      
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/home') }}">Mis Datos</a></li>
                                    <li><a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a></li>                                                       
                                </ul>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                            <div class="d-flex ">

                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm mx-1 bg-login"><span class="fa fa-sign-in "></span> Ingreso</a>
                                @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-sm bg-registro"><span class="fa fa-user-plus"></span> Registro</a>
                                @endif
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>   
</div>
