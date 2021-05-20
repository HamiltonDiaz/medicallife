@extends('layouts.main')


@foreach ($users as $user)
<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar{{$user->id}}" tabindex="-2" aria-labelledby="modalEliminar{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminar{{$user->id}}">Eliminar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>¿Está seguro de eliminar el producto <b>{{$user->name}}</b>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="{{Route('users-admin')}}/delete/{{$user->id}}" class="btn btn-danger" ></i> Eliminar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifcar -->
<div class="modal fade" id="modalEdit{{$user->id}}" tabindex="-2" aria-labelledby="modalEdit{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit{{$user->id}}">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('edit-user')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">                                
                                <label for="name">Nombre</label>
                                <input type="hidden" name="id" id="id" value="{{$user->id}}" >                                
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre" value="{{$user->name}}" required>
                            </div>
                            <div class="form-group ">                                
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Escriba email" value="{{$user->email}}" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$user->ciudad}}">
                                    
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="dpto">Departamento</label>
                                    <input type="text" class="form-control" id="dpto" name="dpto" value="{{$user->dpto}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" class="form-control" id="pass" name="pass">
                                </div>
                                
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" value="{{$user->telefono}}">
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
                <h5 class="modal-title" id="modalCrear">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="{{Route('store-user')}} " enctype="multipart/form-data" autocomplete="off" >
                    @csrf
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">                                
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre" required>
                            </div>
                            <div class="form-group ">                                
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Escriba email" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                                    
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="dpto">Departamento</label>
                                    <input type="text" class="form-control" id="dpto" name="dpto">
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" class="form-control" id="pass" name="pass" required>
                                </div>
                                
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono">
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
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Dpto</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th class="py-4" scope="row">{{$user->id}} </th>
                <td class="py-4">{{$user->name}}</td>
                <td class="py-4">{{$user->email}}</td>
                <td class="py-4">{{$user->telefono}}</td>
                <td class="py-4" >{{$user->ciudad}}</td>
                <td class="py-4" >{{$user->dpto}}</td>
                <td class="py-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit{{$user->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$user->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>

            @endforeach 
        </tbody>
    </table>

@endsection