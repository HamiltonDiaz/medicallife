@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="d-flex justify-content-center aling-items-center">
        <div class="card-group">
            <div class="card">
                <div class="mx-auto">
                    <img id="viewimg{{$producto->id}}" width="400px" height="400px" src="{{asset('storage/img')}}/{{$producto->img}} " alt="Sin imagen">                
                </div>
                
            </div>
            <div class="card flex-row">
                <div class="card-body ">
                    <h5 class="card-title titulos-inicio ">{{$producto->nombre}}</h5>
                    <div class="my-3">
                        <h6><b>Descripción:</b> </h6>
                        <p class="card-text" style="width: 300px; font:bold">{{$producto->descripcion}}</p>                    
                        <p class="card-text text-muted"><b>Referencia:</b> {{$producto->referencia}}</p>
                    </div>
                    
                </div>
            </div>

        </div>

    </div>
</div>
    
@endsection