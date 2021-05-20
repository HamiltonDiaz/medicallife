
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Médical Life</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Parametros Generales</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lineas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo e(Route("lines")); ?> ">Ver líneas</a>
                        </li>
                        <li>
                            <a href="<?php echo e(Route("createline")); ?> ">Crear línea</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#productMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
                    <ul class="collapse list-unstyled" id="productMenu">
                        <li>
                            <a href="<?php echo e(Route("products")); ?> ">Ver productos</a>
                        </li>
                        <li>
                            <a href="<?php echo e(Route("createproduct")); ?>">Crear producto</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#menuUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                    <ul class="collapse list-unstyled" id="menuUser">
                        <li>
                            <a href="<?php echo e(Route("users-admin")); ?>">Ver Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo e(Route("create-user")); ?>">Crear Usuario</a>
                        </li>
                        
                    </ul>
                </li>
 
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="/" class="download" target="_blank">Ir al Sitio</a>
                </li>
                
            </ul>
        </nav>

        <?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/layouts/navbars/adminNav.blade.php ENDPATH**/ ?>