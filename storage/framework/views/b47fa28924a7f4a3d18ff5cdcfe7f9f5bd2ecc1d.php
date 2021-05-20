<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="text-center py-3">
        <h4>Crear Producto</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form class="needs-validation" method="POST" action="<?php echo e(Route('storeproduct')); ?> " enctype="multipart/form-data" autocomplete="off" >
                <?php echo csrf_field(); ?>
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

                <div class="form-group">                    
                    <label for="linea">Linea</label>
                    <select class="form-control" id="linea" name="linea" required>
                        <option value="" selected disabled>Seleccione</option>
                        <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descrip">Descripción</label>
                    <textarea class="form-control" id="descrip" name="descrip" rows="3" placeholder="Escriba la descripción de la línea" value="" ></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                       <label for="referencia">Referencia</label>
                       <input type="text" class="form-control" id="referencia" name="referencia" placeholder="#Ref" required >
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

                <div class="form-group">
                    <label for="imgpreview">Seleccione</label>
                    <input type="file" class="form-control-file" id="imgpreview" name="imgpreview" required onchange="readURL(this,'#viewimg')">
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
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/products/createProducts.blade.php ENDPATH**/ ?>