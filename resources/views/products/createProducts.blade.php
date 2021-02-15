@extends('layouts.main')

@section('content')
<div class="container">
    <div class="text-center py-3">
        <h4>Crear línea</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form class="needs-validation" method="POST" action="{{Route('storeline')}} " enctype="multipart/form-data" autocomplete="off" >
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre de la línea" required>
                </div>

                <div class="form-group">
                    <label for="descrip">Descripción</label>
                    <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción de la línea" value="" ></textarea>
                </div>
                <div class="form-group">
                    <label for="imgpreview">Seleccione</label>
                    <input type="file" class="form-control-file" id="imgpreview" name="imgpreview" required onchange="readURL(this,'#viewimg')">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="active" name="active"  checked required>
                    <label class="form-check-label" for="active"  >Activo</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-12" type="submit">
                        <i class="fa fa-plus-square" ></i> Crear
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-5 text-center" id="container-img" style="border: black 2px dashed; " >
            <div id="vistadb" class="py-3"> 
                <img  id="viewimg"style="width: 95%; height: 350px;" src="" alt="Sin imagen">
            </div> 
            
        </div>
    
    </div>
</div>
    
@endsection

