@extends('layouts.main')


@foreach ($products as $product)
<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar{{$product->id}}" tabindex="-2" aria-labelledby="modalEliminar{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminar{{$product->id}}">Eliminar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>¿Está seguro de eliminar el producto <b>{{$product->nombre}}</b>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="{{Route('products')}}/delete/{{$product->id}}" class="btn btn-danger" ></i> Eliminar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifcar -->
<div class="modal fade" id="modalEdit{{$product->id}}" tabindex="-2" aria-labelledby="modalEdit{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit{{$product->id}}">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('editproduct')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">                                
                                <div class="row">
                                    <div class="col ">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="col text-right form-check" >                                        
                                        <input type="hidden" name="activeold" value="{{$product->active}}"> 
                                        <input type="radio" id="activeoffon" name="active" value="on" @if (($product->active)=="on") checked @endif >
                                        <label for="male">Activo</label>
                                        <input type="radio" id="activeoff" name="active" value="off" @if (($product->active)=="off") checked @endif>
                                        <label for="female">Inactivo</label>                                        
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" value="{{$product->id}}" >                                
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre del producto" value="{{$product->nombre}}" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                   <label for="linea">Linea</label>
                                    <select class="form-control" id="linea" name="linea" required>
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($lines as $item)
                                            <option @if ($item->nombre==$product->linea) {{'selected'}} @endif value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="precio">Precio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>                                        
                                        <input id="precio" name="precio" type="number" min="0" class="form-control" value="{{$product->precio}}" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group ">
                                <label for="descrip">Descripción</label>                                
                                <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción del producto">{{$product->descripcion}}</textarea>
                            </div>
                            <div class="form-group row ">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <label for="referencia">Referencia</label>
                                    <input type="text" class="form-control" id="referencia" name="referencia" value="{{$product->referencia}}" placeholder="#Ref" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="imgpreview">Seleccione</label>
                                    <div id="div_file">
                                        <p id="texto"><i class="fa fa-upload" aria-hidden="true"></i> Subir</p>
                                        <input type="file" class="form-control-file" id="btn_enviar" onchange="readURL(this,'#viewimg{{$product->id}}')" name="imgpreview">                                                                                                                       
                                        <input type="hidden" class="form-control-file" id="imgold" name="imgold" value="{{$product->img}}">
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col">                            
                            <div class="text-center" id="container-img" style="border: black 2px dashed; height:350px;" >
                                <div id="vistadb" class="py-3">                                   
                                    <img  id="viewimg{{$product->id}}"style="width: 95%; height: 320px;" src="{{asset('storage/img')}}/{{$product->img}} " alt="Sin imagen"> 
                                </div>                                
                            </div>                  
                          </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-oe" ></i> Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach 

<!-- Modal Crear -->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="modalCrear" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrear">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('storeproduct')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">                                
                                <div class="row">
                                    <div class="col ">
                                        <label for="name">Nombre</label>
                                    </div>
                                    <div class="col text-right">
                                        <input type="checkbox" class="" id="active" name="active"  checked required>
                                        <label class="form-check-label" for="active">Activo</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre del producto" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                   <label for="linea">Linea</label>
                                    <select class="form-control" id="linea" name="linea" required>
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($lines as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="precio">Precio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>                                        
                                        <input id="precio" name="precio" type="number" min="0" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group ">
                                <label for="descrip">Descripción</label>
                                <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción del producto"></textarea>
                            </div>
                            <div class="form-group row ">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <label for="referencia">Referencia</label>
                                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="#Ref" required >
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="imgpreview">Seleccione</label>
                                    <div id="div_file">
                                        <p id="texto"><i class="fa fa-upload" aria-hidden="true"></i> Subir</p>
                                        <input type="file" id="btn_enviar" id="imgpreview" name="imgpreview" required onchange="readURL(this,'#viewimg')">
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col">                            
                            <div class="text-center" id="container-img" style="border: black 2px dashed; height:350px;" >
                                <div id="vistadb" class="py-3"> 
                                    <img  id="viewimg"style="width: 95%; height: 320px;" src="" alt="Sin imagen">
                                </div>                                
                            </div>                  
                          </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square" ></i> Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('content')
    <!-- Button trigger modal Crear-->
   
    <div class="text-right py-2">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCrear">
            <span class="fa fa-plus-square"></span> Crear
        </button>
    </div>


    <table class="table table-hover" id="datatable">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Línea</th>
                <th scope="col">Referencia</th>
                <th scope="col">Precio</th>
                <th scope="col">Activo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th class="py-4" scope="row">{{$product->id}} </th>
                <td class="py-4">{{$product->nombre}}</td>
                <td class="py-4 text-truncate" style="max-width: 300px" >{{$product->descripcion}}</td>
                <td class="py-4" >{{$product->linea}}</td>
                <td class="py-4" >{{$product->referencia}}</td>
                <td class="py-4" >{{$product->precio}}</td>
                @if (($product->active)=="on") 
                    <td class="py-4"><input type="checkbox" checked disabled ></td>
                @else
                    <td class="py-4"><input type="checkbox" disabled ></td>
                @endif 
                <td> <img src="{{asset('storage/img')}}/{{$product->img}} " width="80" height="80" alt=""></td>
                <td class="py-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit{{$product->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$product->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>

            @endforeach 
        </tbody>
    </table>

@endsection