<?php $__env->startSection('content'); ?>
<div class="container ">
    <div class="d-flex justify-content-center aling-items-center">
        <div class="card-group">
            <div class="card">
                <div class="mx-auto">
                    <img id="viewimg<?php echo e($producto->id); ?>" width="400px" height="400px" src="<?php echo e(asset('storage/img')); ?>/<?php echo e($producto->img); ?> " alt="Sin imagen">                
                </div>
                
            </div>
            <div class="card flex-row">
                <div class="card-body ">
                    <h5 class="card-title titulos-inicio "><?php echo e($producto->nombre); ?></h5>
                    <div class="my-3">
                        <h6><b>Descripción:</b> </h6>
                        <p class="card-text" style="width: 300px; font:bold"><?php echo e($producto->descripcion); ?></p>                    
                        <p class="card-text text-muted"><b>Referencia:</b> <?php echo e($producto->referencia); ?></p>
                    </div>
                    
                </div>
            </div>

        </div>

    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/products/productUser.blade.php ENDPATH**/ ?>