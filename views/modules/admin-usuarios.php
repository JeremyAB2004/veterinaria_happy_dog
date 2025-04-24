<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Administración de Usuarios</li>
            </ol>
        </div>
    </nav>
    <!-- Sección: Gestión de Usuarios -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Gestión de Usuarios</h2>
            
            <!-- Tabla de usuarios -->
            <div class="table-responsive mb-5">
                <table class="table table-striped table-hover" id="tablaUsuarios">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los usuarios se cargarán aquí mediante AJAX -->
                    </tbody>
                </table>
            </div>
            
            <!-- Modal para editar usuario -->
            <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarUsuario">
                                <input type="hidden" id="idUsuarioEditar">
                                <div class="mb-3">
                                    <label for="nombreEditar" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreEditar" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="apellidosEditar" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidosEditar" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="correoEditar" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correoEditar" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="rolEditar" class="form-label">Rol</label>
                                    <select class="form-control" id="rolEditar" required>
                                        <option value="">Seleccione un rol</option>
                                        <!-- Las opciones se cargarán dinámicamente -->
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="views/js/admin-usuarios.js"></script>