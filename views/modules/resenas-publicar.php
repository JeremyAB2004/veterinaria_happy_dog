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

    <section class="py-5" style="background-color: var(--light-color);">
        <div class="container">
            <!-- Título principal -->
            <h1 class="text-center mb-5 fw-bold" style="color: var(--third-color); font-size: 2.5rem;">
                Publicar Experiencia
            </h1>

            <!-- Formulario -->
            <form id="formPublicarExperiencia" class="mx-auto p-4 rounded-4 shadow-sm"
                style="background-color: white; max-width: 700px; border: 1px solid var(--primary-color);">
                <div class="mb-4">
                    <label for="nombreCliente" class="form-label fw-semibold" style="color: var(--dark-color);">
                        Nombre completo
                    </label>
                    <input type="text" id="nombreCliente" class="form-control border-0 shadow-sm"
                        required style="background-color: var(--light-color);">
                </div>

                <div class="mb-4">
                    <label for="experienciaCliente" class="form-label fw-semibold" style="color: var(--dark-color);">
                        Cuéntenos su experiencia
                    </label>
                    <textarea id="experienciaCliente" class="form-control border-0 shadow-sm" rows="5"
                            required style="background-color: var(--light-color);"></textarea>
                </div>

                <div class="mb-4">
                    <label for="calificacion" class="form-label fw-semibold" style="color: var(--dark-color);">
                        Calificación
                    </label>
                    <select id="calificacion" class="form-select shadow-sm border-0"
                            required style="background-color: var(--light-color);">
                        <option value="">Seleccione una calificación</option>
                        <option value="1">1 - Mala</option>
                        <option value="2">2 - Regular</option>
                        <option value="3">3 - Buena</option>
                        <option value="4">4 - Muy buena</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>

                <button type="submit" class="btn w-100 fw-bold py-2"
                        style="background-color: var(--accent-color); color: var(--dark-color); border: none;">
                    Publicar reseña
                </button>
            </form>

            <!-- Mensaje de éxito -->
            <div id="mensajeExito"
                class="alert alert-success d-none mt-4 rounded-3 text-center"
                style="background-color: var(--primary-color); color: white; max-width: 700px; margin: 0 auto;">
                ¡Gracias por tu reseña! Ha sido enviada para revisión.
            </div>

            <!-- Título de reseñas -->
            <h2 class="text-center my-5 fw-bold" style="color: var(--third-color); font-size: 2rem;">
                Reseñas de nuestros clientes
            </h2>

            <!-- Listado de reseñas -->
            <div id="listaResenas" class="row g-4">
                <!-- Las reseñas se cargarán aquí mediante AJAX -->
            </div>
        </div>
    </section>



</main>

<!-- Incluir nuestro archivo JS -->
<script src="views/js/resenas.js"></script>