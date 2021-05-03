@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('status')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>                       
    @endif
    needs-validation
    <h4 class="text-center" >Mis datos</h4>
    <form class="row " novalidate action="{{route('upinfo')}}" method="POST" >
        @csrf
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <label for="nombre" class="form-label  @error('nombre') is-invalid @enderror" data-error="" >Nombre o Razón Social</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->name }}" required>

            <div class="help-block form-text with-errors form-control-feedback"></div>
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror



        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control @error('email') is-invalid @enderror" data-error="" name="email" id="email" value="{{ Auth::user()->email }}" aria-describedby="inputGroupPrepend2"
                    required>
                <div class="help-block form-text with-errors form-control-feedback"></div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
                <input type="number" name="telefono" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                    min="0" value="{{Auth::user()->telefono}}" >
                <i class="input-group-text"> <span class="fa fa-phone"></span></i>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="dpto" class="form-label">Departamento</label>
            <input type="text" name="dpto" class="form-control" id="dpto" value="{{Auth::user()->dpto}}">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" id="ciudad" value="{{Auth::user()->ciudad}}">
        </div>
        <div class="ml-auto">
            <button class="btn btn-primary m-3" type="submit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Actualizar
            </button>            
        </div>
    </form>
    <h4>Cambiar Contraseña</h4>
    @if (Session::has('statusok'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('statusok')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>                       
    @endif
    <form class="row needs-validation" novalidate action="{{route("uppass")}}" method="POST" >
        @csrf
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <input type="hidden" name="id" value="{{Auth::user()->id}}" >
            <label for="">Contraseña Actual</label><input class="form-control @error('current_password') is-invalid @enderror"
                data-error=""  type="password" name="current_password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="">Nueva Contraseña</label><input class="form-control  @error('password') is-invalid @enderror"
            data-error=""  name="password" type="password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="">Repetir Nueva Contraseña</label><input class="form-control"
            data-error=""  name="password_confirmation" type="password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="ml-auto">
            <button class="btn btn-success m-3" type="submit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Cambiar
            </button>            
        </div>
    </form>
</div>
@endsection
