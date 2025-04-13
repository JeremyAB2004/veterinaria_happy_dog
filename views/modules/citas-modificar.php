<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Acá puede modificar su cita</li>
            </ol>
        </div>
    </nav>

    

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Modificar/Cancelar Cita</h1>
            <form id="formModificarCita">
                <div class="mb-3">
                    <label for="buscarCita" class="form-label">Buscar Cita</label>
                    <input type="text" class="form-control" id="buscarCita" placeholder="Ingrese ID de la cita o nombre de la mascota" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <div id="detalleCita" class="mt-4">
        
            </div>
        </div>
    </section>
</main>

