@extends('layouts.app')
@section('content')
    <div class="back-inicio" id="inicio">
        <div class="row" >            
            <div class="col-lg-7 col-md-7 col-sm-12 col-12"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 text-center" style="" >                
                <img class="logo-medical-inicio" src="{{asset('img/logo.png')}} " alt="Logo">                
                <p class="parrafo-inicio">
                    Es una empresa Colombiana dedicada a la comercialización
                    y distribución de material médico.
                </p>
            </div>
        </div>
    </div>

    <div id="productos"></div>
    <div class="container text-center py-3" >
        <h1 class="titulos-inicio" style="" >Nuestros Productos</h1>
    </div>   
    
    <div class="container">
        <div class="row d-flex justify-content-center aling-items-center">        
            @foreach ($lines as $item)   
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 card mx-1" style="max-width: 12rem;" >
                    <img src="{{asset('storage/img')}}/{{$item->img}} " class="card-img-top mt-2" alt="..." height="150">
                    <h5 class="card-title text-center">{{$item->nombre}}</h5>
                    <div class="card-body p-0 ">
                        <small><p class="card-text text-truncate"> {{$item->descripcion}}</p></small>
                    </div>
                    <div class="text-center py-2"><a href="/us/lines/{{$item->id}}" class="btn bg-registro">Ver más</a></div>
                </div>
            @endforeach
        </div>  
    </div>

    <div id="encuentranos" class="py-5">
        <div class="container text-center py-3" >
            <h1 class="titulos-inicio" >Encuéntranos</h1>
        </div>    
        <div class="container text-center ">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.601540566396!2d-75.29079898623306!3d2.930283597865754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b74649d307c99%3A0x78caaef4e7598fcf!2sCra.%206%20%2311-08%2C%20Neiva%2C%20Huila!5e0!3m2!1ses!2sco!4v1612226122191!5m2!1ses!2sco" width="800" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>


@endsection