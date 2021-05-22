<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal ver-->
    <div class="modal fade" id="modalVer<?php echo e($product->id); ?>" tabindex="-2"
        aria-labelledby="modalVer<?php echo e($product->id); ?>" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="titulos-modal modal-title text-uppercase" id="modalVer<?php echo e($product->id); ?>">
                        <?php echo e($product->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid text-center">
                        <img id="viewimg<?php echo e($product->id); ?>" width="250px" height="300px"
                            src="<?php echo e(asset('storage/img')); ?>/<?php echo e($product->img); ?> " alt="Sin imagen">
                    </div>
                    <small>*Esta una imagen de referencia, puede presentar variaciones.*</small>
                    <h6><b>Referencia:</b> <?php echo e($product->referencia); ?></h6>                    
                    <h6><b>Descripción:</b></h6>
                    <p style="word-break: break-all !important;"> <?php echo e($product->descripcion); ?></p>

                    <div class="text-right">
                        <b>Precio:</b>
                        <a class="btn btn-success"
                            href="https://api.whatsapp.com/send?phone=<?php echo e(env('WHATSAPP_NUMBER')); ?>&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20sobre%20este%20producto%20<?php echo e($product->nombre); ?>%20<?php echo e(route('welcome') . '/us/product/' . $product->id); ?>"
                            target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid text-center">
                        <button type="button" class="btn bg-registro" data-dismiss="modal"><i class="fa fa-power-off"
                                aria-hidden="true"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-12 border rounded ml-4">
            <h6>Buscar</h6>
            <form action="<?php echo e(Route('filterproductname')); ?>" method="GET">
                
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="findprod" id="findprod" placeholder="Nombre producto">
                    <input class="form-check-input" type="hidden" value="" name="linea[]">
                </div>
                <div class="text-right mb-2">
                    <button type="submit" class="btn btn-success" style="color: white" >Buscar</button>
                </div>
            
                <hr>
            </form>

            <form action="<?php echo e(Route('filterproduct')); ?>" method="GET">
                <h6>Filtrar</h6>
            
                
                <?php echo csrf_field(); ?>
                <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input type="hidden" name="findprod" id="findprod">
                        <input class="form-check-input" type="checkbox" value="<?php echo e($item->id); ?>" name="linea[]"
                            id="linea<?php echo e($item->id); ?>">
                        <label class="form-check-label" for="linea">
                            <?php echo e($item->nombre); ?>

                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="text-right mb-2">
                    <button type="submit" class="btn btn-success" style="color: white" >Filtrar</button>
                </div>
            </form>
        </div>

        <div class="container col-xl-9 col-lg-9 col-md-9 col-sm-11 col-11 ">

            <?php if($products): ?>
                <?php if($products[0]): ?>
                    <div class="text-center">
                        <h1 class="titulos-inicio">
                            <?php if($filtro == 1): ?>
                                <?php echo e('Filtrado'); ?>

                                <h6>
                                    (
                                        <?php if($_GET['findprod']!="" ): ?>
                                            Producto: "<?php echo e($_GET['findprod']); ?>"
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $_GET['linea']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ln): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item == $ln->id): ?>
                                                    <?php echo e($ln->nombre); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    )
                                </h6>
                            <?php elseif($filtro==2): ?>
                                <?php echo e('Todos'); ?>

                            <?php else: ?>
                                <?php echo e($products[0]->linea); ?>

                                <h6 class="container"><?php echo e($products[0]->desclinea); ?></h6>
                            <?php endif; ?>
                        </h1>
                    </div>
                <?php else: ?>
                    <div class="container py-5 col-12">
                        <div class="alert alert-danger text-center " role="alert">
                            ¡No existen productos con estos parámetros!
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="container py-5 col-12">
                    <div class="alert alert-danger text-center " role="alert">
                        ¡No existen productos con estos parámetros!
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="row d-flex justify-content-center aling-items-center">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 card mx-1">
                        <div class="text-center mt-3 mx-3">
                            <img class="card-img-top " width="180" height="180"
                                src="<?php echo e(asset('storage/img')); ?>/<?php echo e($product->img); ?> " alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo e($product->nombre); ?></h4>
                            <p class="card-text text-truncate"> <?php echo e($product->descripcion); ?></p>
                            <p><small>Linea: <?php echo e($product->linea); ?></small> </p>
                            <div class="text-center my-2">
                                <button type="button" class="btn bg-registro" data-toggle="modal"
                                    data-target="#modalVer<?php echo e($product->id); ?>">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i> Ver más
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="my-3 d-flex justify-content-center aling-items-center">
                <?php if($products): ?>
                    <?php if($products[0]): ?>
                        <?php if($filtro == 1): ?>
                            <?php echo e($products->appends(['findprod' => $_GET['findprod'], 'linea' => $_GET['linea']])->links('layouts.paginate.paginationlinks')); ?>

                        <?php else: ?>
                            <?php echo e($products->appends(['id' => $lineid])->links('layouts.paginate.paginationlinks')); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/products/listProductUser.blade.php ENDPATH**/ ?>