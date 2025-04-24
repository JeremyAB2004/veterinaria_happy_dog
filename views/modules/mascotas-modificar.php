<?php
if (!$usuarioLogueado) {
    echo '<script>window.location = "login";</script>';
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
                <li class="breadcrumb-item active" aria-current="page">Modificar mascota</li>
            </ol>
        </div>
    </nav>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4 fw-bold text-primary">Editar Datos de la Mascota</h2>
                            
                            <!-- Paso 1: Seleccionar mascota -->
                            <div id="seleccionMascota">
                                <div class="mb-4">
                                    <label for="selectorMascota" class="form-label">Seleccione una mascota para editar</label>
                                    <select class="form-select form-select-lg rounded-3" id="selectorMascota" required>
                                        <option value="" selected disabled>-- Seleccione --</option>
                                        <!-- Las opciones se cargarán con JavaScript -->
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <button id="btnCargarMascota" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                        Cargar datos
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Paso 2: Formulario de edición (inicialmente oculto) -->
                            <div id="formularioEdicion" style="display: none;">
                                <form id="formEditarMascota">
                                    <input type="hidden" id="id_mascota" name="id_mascota">
                                    <div class="mb-3">
                                        <label for="nombreMascota" class="form-label">Nombre de la Mascota</label>
                                        <input type="text" class="form-control form-control-lg rounded-3" id="nombreMascota" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="especieMascota" class="form-label">Especie</label>
                                        <input type="text" class="form-control form-control-lg rounded-3" id="especieMascota" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="razaMascota" class="form-label">Raza</label>
                                        <input type="text" class="form-control form-control-lg rounded-3" id="razaMascota" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edadMascota" class="form-label">Edad</label>
                                        <input type="number" class="form-control form-control-lg rounded-3" id="edadMascota" required>
                                    </div>
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuarioLogueado['id']; ?>">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success btn-lg rounded-pill shadow-sm">
                                            Guardar Cambios
                                        </button>
                                        <button type="button" id="btnCancelarEdicion" class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm">
                                            Cancelar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="views/js/mascotas-modificar.js"></script>