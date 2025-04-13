<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Publicar reseñas</li>
            </ol>
        </div>
    </nav>

    

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Publicar Experiencia</h1>
            <form id="formPublicarExperiencia">
                <div class="mb-3">
                    <label for="nombreCliente" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreCliente" required>
                </div>
                <div class="mb-3">
                    <label for="experienciaCliente" class="form-label">Experiencia</label>
                    <textarea class="form-control" id="experienciaCliente" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </section>
</main>