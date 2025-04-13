
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
    <!-- Sección: Agendar cita -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Agendar cita</h2>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="identificacion" class="form-label">Identificación</label>
                    <input type="text" class="form-control" id="identificacion" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" required>
                </div>
                <button type="submit" class="btn btn-uno">Agendar cita</button>
            </form>
        </div>
    </section>
</main>
