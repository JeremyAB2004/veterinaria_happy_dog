<link rel="stylesheet" href="views/css/sitemap.css">

<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mapa del sitio</li>
            </ol>
        </div>
    </nav>

    <!-- Página Sitemap -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center fw-bold mb-4">Mapa del sitio</h1>

            <!-- Imagen del Sitemap -->
            <div class="text-center mb-5">
                <img src="views/img/sitemap.png" alt="Mapa del sitio" class="img-fluid" style="max-width: 1000px;">
            </div>

            <div class="sitemap-section">
                <h2>Inicio</h2>
                <ul class="sitemap-list">
                    <li><a href="inicio.php">Página de Inicio</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Usuarios</h2>
                <ul class="sitemap-list">
                    <li><a href="registro.php">Crear Cuenta</a></li>
                    <li><a href="recuperar-contrasena.php">Recuperar Contraseña</a></li>
                    <li><a href="admin-usuarios.php">Administración de Usuarios</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Mascotas</h2>
                <ul class="sitemap-list">
                    <li><a href="mascotas-gestion.php">Gestión de Mascotas</a></li>
                    <li><a href="mascotas-registrar.php">Registrar Mascota</a></li>
                    <li><a href="mascotas-modificar.php">Modificar Mascota</a></li>
                    <li><a href="mascotas-consulta.php">Consultar Mascota</a></li>
                    <li><a href="mascotas-historial.php">Historial de Mascotas</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Citas</h2>
                <ul class="sitemap-list">
                    <li><a href="citas-gestion.php">Gestión de Citas</a></li>
                    <li><a href="citas-agendar.php">Agendar Cita</a></li>
                    <li><a href="citas-modificar.php">Modificar Cita</a></li>
                    <li><a href="citas-programadas.php">Citas Programadas</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Clientes</h2>
                <ul class="sitemap-list">
                    <li><a href="clientes-agregar.php">Agregar Cliente</a></li>
                    <li><a href="clientes-modificar.php">Modificar Cliente</a></li>
                    <li><a href="clientes-consulta.php">Consultar Cliente</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Reseñas</h2>
                <ul class="sitemap-list">
                    <li><a href="resenas-publicar.php">Publicar Reseña</a></li>
                    <li><a href="resenas-revision.php">Revisión de Reseñas</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Administración</h2>
                <ul class="sitemap-list">
                    <li><a href="admin-estadisticas.php">Estadísticas</a></li>
                    <li><a href="404.php">Página de Error</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <h2>Extras</h2>
                <ul class="sitemap-list">
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="servicios-disponibles.php">Servicios Disponibles</a></li>
                </ul>
            </div>
        </div>
    </section>
</main>