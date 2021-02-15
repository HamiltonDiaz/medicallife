
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
                            <a href="{{Route("lines")}} ">Ver líneas</a>
                        </li>
                        <li>
                            <a href="{{Route("createline")}} ">Crear línea</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#productMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
                    <ul class="collapse list-unstyled" id="productMenu">
                        <li>
                            <a href="#">Ver productos</a>
                        </li>
                        <li>
                            <a href="#">Crear producto</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#menuUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                    <ul class="collapse list-unstyled" id="menuUser">
                        <li>
                            <a href="#">Ver Usuarios</a>
                        </li>
                        <li>
                            <a href="#">Crear Usuario</a>
                        </li>
                        
                    </ul>
                </li>
 
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="/" class="download" target="_blank">Ir al Sitio</a>
                </li>
                {{-- <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li> --}}
            </ul>
        </nav>

        