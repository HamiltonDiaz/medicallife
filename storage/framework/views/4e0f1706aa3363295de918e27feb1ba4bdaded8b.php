<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar<?php echo e($user->id); ?>" tabindex="-2" aria-labelledby="modalEliminar<?php echo e($user->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminar<?php echo e($user->id); ?>">Eliminar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>¿Está seguro de eliminar el producto <b><?php echo e($user->name); ?></b>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="<?php echo e(Route('users-admin')); ?>/delete/<?php echo e($user->id); ?>" class="btn btn-danger" ></i> Eliminar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifcar -->
<div class="modal fade" id="modalEdit<?php echo e($user->id); ?>" tabindex="-2" aria-labelledby="modalEdit<?php echo e($user->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit<?php echo e($user->id); ?>">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="<?php echo e(Route('edit-user')); ?> " enctype="multipart/form-data" autocomplete="off" >
                    <?php echo csrf_field(); ?>
                    <div class="form row">
                        <div class="col">
                            <div class="form-group ">                                
                                <label for="name">Nombre</label>
                                <input type="hidden" name="id" id="id" value="<?php echo e($user->id); ?>" >                                
                                <input type="text" class="form-control" id="name" name="name" placeholder="Escriba el nombre" value="<?php echo e($user->name); ?>" required>
                            </div>
                            <div class="form-group ">                                
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Escriba email" value="<?php echo e($user->email); ?>" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo e($user->ciudad); ?>">
                                    
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="dpto">Departamento</label>
                                    <input type="text" class="form-control" id="dpto" name="dpto" value="<?php echo e($user->dpto); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" class="form-control" id="pass" name="pass">
                                </div>
                                
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <label for="telefono">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo e($user->telefono); ?>">
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
                <h5 class="modal-title" id="modalCrear">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="<?php echo e(Route('store-user')); ?> " enctype="multipart/form-data" autocomplete="off" >
                    <?php echo csrf_field(); ?>
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
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Dpto</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th class="py-4" scope="row"><?php echo e($user->id); ?> </th>
                <td class="py-4"><?php echo e($user->name); ?></td>
                <td class="py-4"><?php echo e($user->email); ?></td>
                <td class="py-4"><?php echo e($user->telefono); ?></td>
                <td class="py-4" ><?php echo e($user->ciudad); ?></td>
                <td class="py-4" ><?php echo e($user->dpto); ?></td>
                <td class="py-4">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit<?php echo e($user->id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar<?php echo e($user->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/users/listUser.blade.php ENDPATH**/ ?>