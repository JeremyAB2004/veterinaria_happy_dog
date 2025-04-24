<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agendar cita</li>
            </ol>
        </div>
    </nav>

    <!-- Sección: Agendar Cita -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Agendar Cita</h2>
            <form id="form-agendar-cita">
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <select class="form-control" id="id_cliente" required>
                        <!-- Opciones de clientes se cargarán dinámicamente -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_mascota" class="form-label">Mascota</label>
                    <select class="form-control" id="id_mascota" required>
                        <!-- Opciones de mascotas se cargarán dinámicamente -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fecha_cita" class="form-label">Fecha y Hora</label>
                    <input type="datetime-local" class="form-control" id="fecha_cita" required>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo de la Cita</label>
                    <textarea class="form-control" id="motivo" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Completada">Completada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="notas" class="form-label">Notas Adicionales</label>
                    <textarea class="form-control" id="notas" rows="2"></textarea>
                </div>
                <button type="button" class="btn btn-uno" id="btnAgendarCita">Agendar Cita</button>
            </form>
        </div>
    </section>
</main>

<script src="views/js/citas.js"></script>