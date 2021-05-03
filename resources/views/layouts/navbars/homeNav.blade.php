
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light mx-0 py-0" >
        <div class="container-fluid">
            
            @if (Request::path()!="login" and Request::path()!="register" and Request::path()!="home" )
                <a class="navbar-brand " href="{{ url('/') }}">
                    <img  class="logo-medical collapse navbar-collapse " src="{{ asset('img/logo.png')}} " alt="Logo" >
                </a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/#menu') }}"><span class="fa fa-home"></span> Inicio</a>
                    </li>
    
                    @if (Request::path()!="welcome")
                        @php                        
                            $ruta="/"
                        @endphp
                    @else
                        @php
                            $ruta=""
                        @endphp
                    @endif
                    @if (Request::path()!="login" and Request::path()!="register" )
                            <div class="btn-group">
                                <a class="nav-link" href="{{$ruta}}#productos"><span class="fa fa-shopping-bag"></span> Productos</a>
                                <button type="button" class="btn nav-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                style="max-width: 15px; max-height:50px" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" >
                                    @foreach ($lines as $item)
                                        <a class="dropdown-item" href="/us/lines/{{$item->id}}">{{$item->nombre}} </a>
                                    @endforeach
                                     <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/us/lines/0">Ver todos</a>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="{{$ruta}}#encuentranos"><span class="fa fa-map-marker"></span> ¿Cómo llegar?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true"><span class="fa fa-envelope-open"></span> Contáctenos</a>
                            </li>              
                    @endif
                </ul>
                <div class="d-flex align-items-end">
                    @if (Route::has('login'))
                        @auth

                        <div class="dropdown">
                            <button class="btn bg-registro dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ url('/home') }}">Mis datos</a>
                              <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                </a>
                            </div>
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