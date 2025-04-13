<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Acá puede modificar los datos de su mascota.</li>
            </ol>
        </div>
    </nav>

    

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Editar Datos de la Mascota</h1>
            <form id="formEditarMascota">
                <div class="mb-3">
                    <label for="nombreMascota" class="form-label">Nombre de la Mascota</label>
                    <input type="text" class="form-control" id="nombreMascota" required>
                </div>
                <div class="mb-3">
                    <label for="especieMascota" class="form-label">Especie</label>
                    <input type="text" class="form-control" id="especieMascota" required>
                </div>
                <div class="mb-3">
                    <label for="razaMascota" class="form-label">Raza</label>
                    <input type="text" class="form-control" id="razaMascota">
                </div>
                <div class="mb-3">
                    <label for="edadMascota" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="edadMascota" required>
                </div>
                <div class="mb-3">
                    <label for="propietarioMascota" class="form-label">Propietario</label>
                    <input type="text" class="form-control" id="propietarioMascota" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </section>
</main>
