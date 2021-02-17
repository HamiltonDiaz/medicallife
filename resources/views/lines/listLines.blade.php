


@extends('layouts.main')


@foreach ($lines as $line)

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar{{$line->id}}" tabindex="-2" aria-labelledby="modalEliminar{{$line->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminar{{$line->id}}">Eliminar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
             <h4>¿Está seguro de eliminar la linea <b>{{$line->nombre}}</b>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="{{Route('lines')}}/delete/{{$line->id}}" class="btn btn-danger" ></i> Eliminar</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal Modifcar -->
<div class="modal fade" id="modalEdit{{$line->id}}" tabindex="-2" aria-labelledby="modalEdit{{$line->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit{{$line->id}}">Editar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('editline')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="hidden" name="id" id="id" value="{{$line->id}}" >
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre de la línea" value="{{$line->nombre}}" required>
                            </div>
            
                            <div class="form-group ">
                                <label for="descrip">Descripción</label>
                                <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción de la línea" >{{$line->descripcion}}</textarea>
                            </div>
                            <div class="form-group ">
                                <label for="imgpreview">Seleccione</label>
                                <input type="file" class="form-control-file" id="imgpreview" onchange="readURL(this,'#viewimg{{$line->id}}')" name="imgpreview">
                                <input type="hidden" class="form-control-file" id="imgold" name="imgold" value="{{$line->img}}">
                            </div>

                            <div class="form-group text-right form-check ">
                                <input type="radio" id="activeoffon" name="active" value="on" @if (($line->active)=="on") checked @endif >
                                <label for="male">Activo</label>
                                <input type="radio" id="activeoff" name="active" value="off" @if (($line->active)=="off") checked @endif>
                                <label for="female">Inactivo</label>
                                <input type="hidden" id="activeold" name="activeold"  value="{{$line->active }}" >
                                
                            </div>

                          </div>
                          <div class="col">
                            
                            <div class="text-center" id="container-img" style="border: black 2px dashed; height:350px;" >
                                <div id="vistadb" class="py-3"> 
                                    <img  id="viewimg{{$line->id}}"style="width: 95%; height: 320px;" src="{{asset('storage/img')}}/{{$line->img}} " alt="Sin imagen">
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
                <h5 class="modal-title" id="modalCrear">Crear Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('storeline')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre de la línea" required>
                            </div>
            
                            <div class="form-group ">
                                <label for="descrip">Descripción</label>
                                <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción de la línea"></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="imgpreview">Seleccione</label>
                                <input type="file" class="form-control-file" id="imgpreview" name="imgpreview" required onchange="readURL(this,'#viewimg')">
                            </div>
                        
                            <div class="form-group text-right form-check ">
                                <input type="checkbox" class="form-check-input" id="active" name="active"  checked required>
                                <label class="form-check-label" for="active">Activo</label>
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
                <th scope="col">Nombre Línea</th>
                <th scope="col">Descripción</th>
                <th scope="col">Activo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lines as $line)
            <tr>
                <th class="py-4" scope="row">{{$line->id}} </th>
                <td class="py-4">{{$line->nombre}}</td>
                <td class="py-4 text-truncate" style="max-width: 300px">{{$line->descripcion}}</td>
                @if (($line->active)=="on") 
                    <td class="py-4"><input type="checkbox" checked disabled ></td>
                @else
                    <td class="py-4"><input type="checkbox" disabled ></td>
                @endif 
                <td> <img src="{{asset('storage/img')}}/{{$line->img}} " width="80" height="80" alt=""></td>
                <td class="py-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit{{$line->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$line->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>

            @endforeach 
        </tbody>
    </table>

@endsection