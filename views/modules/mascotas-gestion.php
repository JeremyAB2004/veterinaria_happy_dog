<?php

if (!$usuarioLogueado){
    echo '<script>

        window.location = "login";

    </script>';
    exit;
}


?>

<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión-Mascotas</li>
            </ol>
        </div>
    </nav>

    

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4 fw-bold text-primary">Gestión de Mascotas</h2>
                            <div class="list-group list-group-flush">
                                <a href="mascotas-registrar" class="list-group-item list-group-item-action py-3 px-4 rounded-3 mb-2 shadow-sm">Registrar Nueva Mascota</a>
                                <a href="mascotas-historial" class="list-group-item list-group-item-action py-3 px-4 rounded-3 mb-2 shadow-sm">Consultar Historial de la Mascota</a>
                                <a href="mascotas-modificar" class="list-group-item list-group-item-action py-3 px-4 rounded-3 shadow-sm">Editar Datos de la Mascota</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
