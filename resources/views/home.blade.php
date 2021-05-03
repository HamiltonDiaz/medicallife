@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>                       
            @endif
            <form class="row g-3 needs-validation" novalidate action="{{route("sendcontact")}}" method="POST" >
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="nombre" class="form-label">Nombre o Razón Social</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend2"
                            required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <div class="input-group">
                        <input type="number" name="telefono" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                         min="0" required>
                        <i class="input-group-text"> <span class="fa fa-phone"></span></i>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="asunto" class="form-label">Asunto</label>
                    <select class="form-control" id="asunto" name="asunto" required>
                        <option selected disabled value="">Seleccione</option>
                        <option>Lista de precios</option>
                        <option>Solicitud información</option>
                        <option>Sugerencia</option>
                        <option>Queja</option>
                        <option>Reclamo</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="dpto" class="form-label">Departamento</label>
                    <input type="text" name="dpto" class="form-control" id="dpto" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="citudad" class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" id="ciudad" required>
                </div>
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>                    
                </div>                
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="habeas" type="checkbox" checked id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Acepto Habeas data y Protección de datos
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <button class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-12" type="submit">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar
                </button>
                </div>
            </form>

        </div>
        <div class="col-lg-5 text-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <img class="logo-medical-contact" src="{{ asset('img/logo.png')}} " alt="Logo">
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="">
                    Carrera 6 No. 11 - 08  <br>
                    <small>Neiva - Huila</small>
                </h5>
                
                <h5 class="py-3">
                    <b> Teléfonos:</b><br>
                    <small>(+57)(8) 8 88 88 88</small> <br>
                    <small>(+57) 333 333 33 33</small>s
                </h5>

            </div>

            
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="">
                    <b>Síguenos en:</b>  
                </h5>
                <a href="https://www.facebook.com/medical.lif"><img class="redes"
                        src="{{ asset('img/facebook.png')}} " alt="facebook"></a>
                <a href="https://www.facebook.com/medical.lif"><img class="redes"
                        src="{{ asset('img/instagram.png')}} " alt="facebook"></a>
                <a href="https://www.facebook.com/medical.lif"><img class="redes"
                        src="{{ asset('img/whatsapp.png')}} " alt="facebook"></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
