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
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="mascotasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mascotas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="mascotasDropdown">
                            <li><a class="dropdown-item" href="mascotas-gestion">Gestión</a></li>
                            <li><a class="dropdown-item" href="mascotas-registrar">Registrar</a></li>
                            <li><a class="dropdown-item" href="mascotas-modificar">Modificar</a></li>
                            <li><a class="dropdown-item" href="mascotas-historial">Historial</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="citasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Citas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="citasDropdown">
                            <li><a class="dropdown-item" href="citas-gestion">Gestión</a></li>
                            <li><a class="dropdown-item" href="citas-agendar">Agendar</a></li>
                            <li><a class="dropdown-item" href="citas-programadas">Citas programadas</a></li>
                            <li><a class="dropdown-item" href="citas-modificar">Modificar cita</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="serviciosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="serviciosDropdown">
                            <li><a class="dropdown-item" href="servicios-disponibles">Servicios disponibles</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientesDropdown">
                            <li><a class="dropdown-item" href="clientes-agregar">Agregar</a></li>
                            <li><a class="dropdown-item" href="clientes-modificar">Modificar</a></li>
                            <li><a class="dropdown-item" href="clientes-consulta">Consulta clientes</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="administracionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="administracionDropdown">
                            <li><a class="dropdown-item" href="admin-estadisticas">Estadísticas</a></li>
                            <li><a class="dropdown-item" href="admin-reportes">Reportes</a></li>
                            <li><a class="dropdown-item" href="admin-usuarios">Gestión usuarios</a></li>
                        </ul>
                    </li>
                </ul>
                
                <div class="login-buttons">
                    <a href="login" class="btn btn-uno">Ingresar</a>
                    <a href="registro" class="btn btn-dos">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>
</header>