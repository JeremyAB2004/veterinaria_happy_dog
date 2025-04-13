<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calificar</li>
            </ol>
        </div>
    </nav>

    

    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Calificación de Servicios</h1>
            <form id="formCalificarServicios">
                <div class="mb-3">
                    <label for="nombreCliente" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreCliente" required>
                </div>
                <div class="mb-3">
                    <label for="calificacion" class="form-label">Calificación</label>
                    <select class="form-select" id="calificacion" required>
                        <option value="1">1 - Muy malo</option>
                        <option value="2">2 - Malo</option>
                        <option value="3">3 - Regular</option>
                        <option value="4">4 - Bueno</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comentarios" class="form-label">Comentarios</label>
                    <textarea class="form-control" id="comentarios" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Calificación</button>
            </form>
        </div>
    </section>
</main>