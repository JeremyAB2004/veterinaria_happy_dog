<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item"><a href="admin">Administración</a></li>
                <li class="breadcrumb-item active" aria-current="page">Revisión de reseñas</li>
            </ol>
        </div>
    </nav>

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Revisión de Reseñas</h1>
            
            <!-- Filtros de estado -->
            <div class="mb-4">
                <div class="btn-group w-100" role="group" aria-label="Filtros de estado">
                    <button type="button" class="btn btn-outline-primary active" data-filter="todas">Todas</button>
                    <button type="button" class="btn btn-outline-warning" data-filter="pendiente">Pendientes</button>
                    <button type="button" class="btn btn-outline-success" data-filter="aprobado">Aprobadas</button>
                    <button type="button" class="btn btn-outline-danger" data-filter="rechazado">Rechazadas</button>
                </div>
            </div>
            
            <!-- Listado de reseñas para revisión -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Experiencia</th>
                            <th>Calificación</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaResenas">
                        <!-- Las reseñas se cargarán aquí mediante AJAX -->
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación -->
            <nav aria-label="Paginación de reseñas" class="mt-4">
                <ul class="pagination justify-content-center" id="paginacionResenas">
                    <!-- La paginación se generará dinámicamente -->
                </ul>
            </nav>
            
            <!-- Modal para ver detalle de reseña -->
            <div class="modal fade" id="modalDetalleResena" tabindex="-1" aria-labelledby="modalDetalleResenaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDetalleResenaLabel">Detalle de Reseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 id="modalNombreCliente"></h5>
                            <div class="mb-3" id="modalCalificacion"></div>
                            <p id="modalExperiencia"></p>
                            <small class="text-muted" id="modalFecha"></small>
                            <div class="mt-3">
                                <label class="form-label">Estado:</label>
                                <select class="form-select" id="modalEstado">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="aprobado">Aprobado</option>
                                    <option value="rechazado">Rechazado</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarEstado">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Incluir nuestro archivo JS -->
<script src="views/js/resenas-revision.js"></script>