
<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Acá puede consultar a su compañero del hogar.</li>
            </ol>
        </div>
    </nav>

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Historial de la Mascota</h1>
            <form id="formConsultarHistorial">
                <div class="mb-3">
                    <label for="buscarMascota" class="form-label">Buscar Mascota</label>
                    <input type="text" class="form-control" id="buscarMascota" placeholder="Ingrese nombre o ID de la mascota" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <div id="historialMascota" class="mt-4">
                <!-- Aquí se mostrará el historial de la mascota -->
            </div>
        </div>
    </section>
</main>