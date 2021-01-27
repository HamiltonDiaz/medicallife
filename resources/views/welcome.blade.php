@extends('layouts.app')
@section('content')
    <div class="back-inicio " id="inicio">
        {{-- <div class="text-right py-5 px-5 col-lg-12 col-md-12 col-sm-12 col-12 " >
            <img class="logo-medical-inicio" src="{{asset('img/logo.png')}} " alt="Logo">
        </div> --}}

        <div class="">            
            <div class="px-3 py-5 col-lg-5 col-md-5 col-sm-12 col-12" style="color:#770179;font-size:25px;float: right;" >
                <div class="text-center">
                    <img class="logo-medical-inicio" src="{{asset('img/logo.png')}} " alt="Logo">
                </div>
                <p class="text-center" style="color:white;font-size:25px;float: right;">
                    Es una empresa Colombiana dedicada a la comercialización y distribución de material médico.
                </p>
            </div>
        </div>
    </div>

    <div id="productos"></div>
    <div class="container text-center py-3" >
        <h1 style="color:#770179; font-size:40px " >Nuestros Productos</h1>
    </div>
    <div class="container">
        <div class="card-group">
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
        </div>

        <div class="card-group">
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
            <div class="card">
                <img src="{{ asset('img/caja-guante.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    
                </div>
                <div class="text-center py-2"><a href="" class="btn bg-registro">Ver más</a></div>
            </div>
        </div>        
    </div>

    <div id="encuentranos" class="py-5">

        <div class="container text-center py-3" >
            <h1 style="color:#770179; font-size:40px " >Encuéntranos</h1>
        </div>
    
        <div class="container text-center ">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.601333534367!2d-75.29093728553504!3d2.9303417552766597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b746482a99aa1%3A0x1349215d3f2c53f8!2sCra.%206%20%2311-19%2C%20Neiva%2C%20Huila!5e0!3m2!1ses!2sco!4v1611718042072!5m2!1ses!2sco" width="800" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>


@endsection