<?php
if (!$usuarioLogueado) {
    echo '<script>window.location = "login";</script>';
    exit;
}
?>

<!-- Contenido de la página -->
<main>
    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuarioLogueado['id']; ?>">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar mascota</li>
            </ol>
        </div>
    </nav>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4 fw-bold text-primary">Mis Mascotas</h2>
                            
                            <!-- Listado de mascotas -->
                            <div class="table-responsive">
                                <table class="table table-hover align-middle" id="tablaMascotas">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Especie</th>
                                            <th>Raza</th>
                                            <th>Edad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoTablaMascotas">
                                        <!-- Las mascotas se cargarán aquí con JavaScript -->
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Cargando...</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Detalles de la mascota seleccionada -->
                            <div class="mt-5" id="detalleMascota" style="display: none;">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Historial de <span id="nombreMascotaSeleccionada"></span></h3>
                                    <button class="btn btn-outline-secondary" id="btnCerrarDetalle">
                                        <i class="fas fa-times"></i> Cerrar
                                    </button>
                                </div>
                                
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">Información Básica</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Especie:</strong> <span id="detalleEspecie"></span></p>
                                                <p><strong>Raza:</strong> <span id="detalleRaza"></span></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Edad:</strong> <span id="detalleEdad"></span> años</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="views/js/mascotas-consulta.js"></script>