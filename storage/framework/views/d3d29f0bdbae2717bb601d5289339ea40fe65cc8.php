<?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar<?php echo e($line->id); ?>" tabindex="-2" aria-labelledby="modalEliminar<?php echo e($line->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminar<?php echo e($line->id); ?>">Eliminar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
             <h4>¿Está seguro de eliminar la linea <b><?php echo e($line->nombre); ?></b>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="<?php echo e(Route('lines')); ?>/delete/<?php echo e($line->id); ?>" class="btn btn-danger" ></i> Eliminar</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal Modifcar -->
<div class="modal fade" id="modalEdit<?php echo e($line->id); ?>" tabindex="-2" aria-labelledby="modalEdit<?php echo e($line->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit<?php echo e($line->id); ?>">Editar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="<?php echo e(Route('editline')); ?> " enctype="multipart/form-data" autocomplete="off" >
                    <?php echo csrf_field(); ?>
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="hidden" name="id" id="id" value="<?php echo e($line->id); ?>" >
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre de la línea" value="<?php echo e($line->nombre); ?>" required>
                            </div>
            
                            <div class="form-group ">
                                <label for="descrip">Descripción</label>
                                <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción de la línea" ><?php echo e($line->descripcion); ?></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="imgpreview">Seleccione</label>
                                <input type="file" class="form-control-file" id="imgpreview" onchange="readURL(this,'#viewimg<?php echo e($line->id); ?>')" name="imgpreview">
                                <input type="hidden" class="form-control-file" id="imgold" name="imgold" value="<?php echo e($line->img); ?>">
                            </div>

                            <div class="form-group text-right form-check ">
                                <input type="radio" id="activeoffon" name="active" value="on" <?php if(($line->active)=="on"): ?> checked <?php endif; ?> >
                                <label for="male">Activo</label>
                                <input type="radio" id="activeoff" name="active" value="off" <?php if(($line->active)=="off"): ?> checked <?php endif; ?>>
                                <label for="female">Inactivo</label>
                                <input type="hidden" id="activeold" name="activeold"  value="<?php echo e($line->active); ?>" >
                                
                            </div>

                          </div>
                          <div class="col">
                            
                            <div class="text-center" id="container-img" style="border: black 2px dashed; height:350px;" >
                                <div id="vistadb" class="py-3"> 
                                    <img  id="viewimg<?php echo e($line->id); ?>"style="width: 95%; height: 320px;" src="<?php echo e(asset('storage/img')); ?>/<?php echo e($line->img); ?> " alt="Sin imagen">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

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
                <form class="needs-validation" method="POST" action="<?php echo e(Route('storeline')); ?> " enctype="multipart/form-data" autocomplete="off" >
                    <?php echo csrf_field(); ?>
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

<?php $__env->startSection('content'); ?>
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
            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th class="py-4" scope="row"><?php echo e($line->id); ?> </th>
                <td class="py-4"><?php echo e($line->nombre); ?></td>
                <td class="py-4 text-truncate" style="max-width: 300px"><?php echo e($line->descripcion); ?></td>
                <?php if(($line->active)=="on"): ?> 
                    <td class="py-4"><input type="checkbox" checked disabled ></td>
                <?php else: ?>
                    <td class="py-4"><input type="checkbox" disabled ></td>
                <?php endif; ?> 
                <td> <img src="<?php echo e(asset('storage/img')); ?>/<?php echo e($line->img); ?> " width="80" height="80" alt=""></td>
                <td class="py-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit<?php echo e($line->id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar<?php echo e($line->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/lines/listLines.blade.php ENDPATH**/ ?>