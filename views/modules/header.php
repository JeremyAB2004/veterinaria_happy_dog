<header>
    <nav class="navbar navbar-expand-lg navbar-light py-2">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center mr-5" href="inicio">
                <img src="views/img/logo.jpeg" alt="Logo Happy Dog">
                <span class="fw-bold">Happy Dog</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVeterinaria" aria-controls="navbarVeterinaria" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarVeterinaria">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio">Inicio</a>
                    </li>

                    <?php if ($usuarioLogueado): ?>

                        <?php if ($usuarioLogueado['rol'] != 2): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="mascotasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mascotas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="mascotasDropdown">
                                    <li><a class="dropdown-item" href="mascotas-gestion">Gestión</a></li>
                                    <li><a class="dropdown-item" href="mascotas-registrar">Registrar</a></li>
                                    <li><a class="dropdown-item" href="mascotas-modificar">Modificar</a></li>
                                    <li><a class="dropdown-item" href="mascotas-consulta">Consulta</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="citasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Citas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="citasDropdown">
                                <li><a class="dropdown-item" href="citas-gestion">Gestión</a></li>
                                <?php if ($usuarioLogueado['rol'] != 2): ?>
                                    <li><a class="dropdown-item" href="citas-agendar">Agendar</a></li>
                                <?php endif ?>
                                <li><a class="dropdown-item" href="citas-programadas">Citas programadas</a></li>
                                <?php if ($usuarioLogueado['rol'] != 3): ?>
                                    <li><a class="dropdown-item" href="citas-modificar">Modificar cita</a></li>
                                <?php endif ?>
                            </ul>
                        </li>
                        
                        <?php if ($usuarioLogueado['rol'] != 3): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="administracionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Administración
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="administracionDropdown">
                                    <li><a class="dropdown-item" href="admin-estadisticas">Estadísticas</a></li>
                                    <?php if ($usuarioLogueado['rol'] == 1): ?>
                                    <li><a class="dropdown-item" href="admin-usuarios">Gestión usuarios</a></li>
                                    <?php endif ?>
                                    <li><a class="dropdown-item" href="resenas-revision">Revisión reseñas</a></li>
                                </ul>
                            </li>
                        <?php endif ?>

                    <?php endif ?>
                        
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientesDropdown">
                            <li><a class="dropdown-item" href="clientes-agregar">Agregar</a></li>
                            <li><a class="dropdown-item" href="clientes-modificar">Modificar</a></li>
                            <li><a class="dropdown-item" href="clientes-consulta">Consulta clientes</a></li>
                        </ul>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="servicios-disponibles">Servicios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contacto">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="blog">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="resenas-publicar">Reseñas</a>
                    </li>
                    
                    
                </ul>
                
                <?php if ($usuarioLogueado): ?>
                    <div class="dropdown">
                        <button class="btn btn-uno dropdown-toggle" type="button" id="usuarioDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= htmlspecialchars($usuarioLogueado['correo']) ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                            <li><a class="dropdown-item text-danger" href="logout">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="login-buttons">
                        <a href="login" class="btn btn-uno">Ingresar</a>
                        <a href="registro" class="btn btn-dos">Registrarse</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</header>