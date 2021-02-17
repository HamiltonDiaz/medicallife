@foreach ($products as $product)
<!-- Modal ver-->
<div class="modal fade" id="modalVer{{$product->id}}" tabindex="-2" aria-labelledby="modalVer{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="titulos-modal modal-title text-uppercase" id="modalVer{{$product->id}}">{{$product->nombre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <img id="viewimg{{$product->id}}" width="250px" height="300px" src="{{asset('storage/img')}}/{{$product->img}} " alt="Sin imagen">
                </div>
                <h6><b>Descripción:</b></h6>
                <p style="word-break: break-all !important;" > {{$product->descripcion}}</p>
                
                <div class="text-right" >
                    <b>Precio:</b>
                    <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=573208178127&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20sobre%20este%20producto%20{{$product->nombre}}%20{{route('welcome').'/us/product/'. $product->id}}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid text-center">
                    <button type="button" class="btn bg-registro" data-dismiss="modal"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.app')

@endforeach 

@section('content')
    @if ($products)
        <div class="text-center py-2">
            <h1 class="titulos-inicio">{{$products[0]->linea}} </h1>
        </div>
    @else
        <div class="container py-5">
            <div class="alert alert-danger text-center " role="alert">
                ¡No existen productos con estos parámetros!
            </div>
        </div>
    @endif
    <div class="container ">
        <div class="card-deck">
            
            @foreach ($products as $product)
                <div class="card mx-1" style="max-width: 15rem;" >
                    <img class="rounded-circle py-2 mx-2" src="{{asset('storage/img')}}/{{$product->img}} " class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h4 class="card-title text-center">{{$product->nombre}}</h4>
                        <p class="card-text text-truncate"> {{$product->descripcion}}</p>                        
                    </div>
                    <div class="text-center py-2"><button type="button" class="btn bg-registro" data-toggle="modal" data-target="#modalVer{{$product->id}}"><i class="fa fa-search-plus" aria-hidden="true"></i> Ver más</button></div>                    
                </div>
            @endforeach    
           
             
            
        </div>        
    </div>
@endsection