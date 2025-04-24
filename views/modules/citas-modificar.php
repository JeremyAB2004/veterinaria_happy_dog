<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar o Cancelar Cita</li>
            </ol>
        </div>
    </nav>

    <!-- Sección: Modificar/Cancelar Cita -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Modificar o Cancelar Cita</h1>
            
            <!-- Formulario para buscar cita -->
            <form id="formBuscarCita">
                <div class="mb-3">
                    <label for="buscarCita" class="form-label">Buscar Cita</label>
                    <input type="text" class="form-control" id="buscarCita" placeholder="Ingrese ID de la cita" required>
                </div>
                <button type="button" class="btn btn-primary" id="btnBuscarCita">Buscar</button>
            </form>

            <!-- Sección para mostrar y modificar la cita -->
            <!-- Sección para mostrar y modificar la cita -->
<div id="detalleCita" class="mt-4" style="display: none;">
    <h3>Detalles de la Cita</h3>
    <form id="formModificarCita">
        <input type="hidden" id="id_cita">

        <!-- Mostrar nombre del dueño -->
        <div class="mb-3">
            <label class="form-label">Dueño</label>
            <p id="nombre_cliente" class="form-control-plaintext"></p>
        </div>

        <!-- Mostrar nombre de la mascota -->
        <div class="mb-3">
            <label class="form-label">Mascota</label>
            <p id="nombre_mascota" class="form-control-plaintext"></p>
        </div>

        <div class="mb-3">
            <label for="fecha_cita" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="fecha_cita">
        </div>
        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea class="form-control" id="motivo"></textarea>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado">
                <option value="Pendiente">Pendiente</option>
                <option value="Confirmada">Confirmada</option>
                <option value="Cancelada">Cancelada</option>
                <option value="Completada">Completada</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="notas" class="form-label">Notas</label>
            <textarea class="form-control" id="notas"></textarea>
        </div>
        <button type="button" class="btn btn-success" id="btnModificarCita">Modificar Cita</button>
    </form>
</div>
        </div>
    </section>
</main>

<script src="views/js/citas.js"></script>