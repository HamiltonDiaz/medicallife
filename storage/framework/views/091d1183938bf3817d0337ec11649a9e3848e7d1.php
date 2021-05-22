<?php $__env->startSection('content'); ?>
    <div class="" id="inicio">
        <img  class="img-fluid" src="<?php echo e(asset('img/intrumental.jpg')); ?>" alt="">
    </div>

    <div id="productos"></div>
    <div class="container text-center py-3" >
        <h1 class="titulos-inicio" style="" >Nuestros Productos</h1>
    </div>   
    
    <div class="container">
        <div class="row d-flex justify-content-center aling-items-center">        
            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 card mx-1" style="max-width: 12rem;" >
                    <img src="<?php echo e(asset('storage/img')); ?>/<?php echo e($item->img); ?> " class="card-img-top mt-2" alt="..." height="150">
                    <h5 class="card-title text-center"><?php echo e($item->nombre); ?></h5>
                    <div class="card-body p-0 ">
                        <small><p class="card-text text-truncate"> <?php echo e($item->descripcion); ?></p></small>
                    </div>
                    <div class="text-center py-2"><a href="/us/lines/<?php echo e($item->id); ?>" class="btn bg-registro">Ver más</a></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>  
    </div>

    <div id="encuentranos" class="py-5">
        <div class="container text-center py-3" >
            <h1 class="titulos-inicio" >Encuéntranos</h1>
        </div>    
        <div class="container text-center ">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.601540566396!2d-75.29079898623306!3d2.930283597865754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b74649d307c99%3A0x78caaef4e7598fcf!2sCra.%206%20%2311-08%2C%20Neiva%2C%20Huila!5e0!3m2!1ses!2sco!4v1612226122191!5m2!1ses!2sco" width="800" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/welcome.blade.php ENDPATH**/ ?>