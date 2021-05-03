
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light mx-0 py-0" >
        <div class="container-fluid">
            
            <?php if(Request::path()!="login" and Request::path()!="register" and Request::path()!="home" ): ?>
                <a class="navbar-brand " href="<?php echo e(url('/')); ?>">
                    <img  class="logo-medical collapse navbar-collapse " src="<?php echo e(asset('img/logo.png')); ?> " alt="Logo" >
                </a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo e(url('/#menu')); ?>"><span class="fa fa-home"></span> Inicio</a>
                    </li>
    
                    <?php if(Request::path()!="welcome"): ?>
                        <?php                        
                            $ruta="/"
                        ?>
                    <?php else: ?>
                        <?php
                            $ruta=""
                        ?>
                    <?php endif; ?>
                    <?php if(Request::path()!="login" and Request::path()!="register" and Request::path()!="forgot-password" ): ?>
                            <div class="btn-group">
                                <a class="nav-link" href="<?php echo e($ruta); ?>#productos"><span class="fa fa-shopping-bag"></span> Productos</a>
                                <button type="button" class="btn nav-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                style="max-width: 15px; max-height:50px" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" >
                                    <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="dropdown-item" href="/us/lines/<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?> </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/us/lines/0">Ver todos</a>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e($ruta); ?>#encuentranos"><span class="fa fa-map-marker"></span> ¿Cómo llegar?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('contact')); ?>" tabindex="-1" aria-disabled="true"><span class="fa fa-envelope-open"></span> Contáctenos</a>
                            </li>              
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-end">
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>

                        <div class="dropdown">
                            <button class="btn bg-registro dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="<?php echo e(url('/home')); ?>">Mis datos</a>
                              <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Salir')); ?>

                                </a>
                            </div>
                        </div> 
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>

                        <?php else: ?>
                            <div class="d-flex ">

                                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary btn-sm mx-1 bg-login"><span class="fa fa-sign-in "></span> Ingreso</a>
                                <?php if(Route::has('register')): ?>
                                        <a href="<?php echo e(route('register')); ?>" class="btn btn-sm bg-registro"><span class="fa fa-user-plus"></span> Registro</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav><?php /**PATH /home/hdebian/Documentos/Repositorios/medicallife/resources/views/layouts/navbars/homeNav.blade.php ENDPATH**/ ?>