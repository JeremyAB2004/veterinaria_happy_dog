<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </div>
    </nav>

    <!-- Sección de Servicios-->
    <section class="py-5">
        <div class="container">
            <div class="formulario-contacto">
                <form>
                    <div class="text-center mb-4">
                        <h3 style="color: var(--primary-color);">¿Tienes preguntas?</h3>
                        <h4 style="color: var(--primary-color);">Danos tu contacto y con gusto te ayudaremos!</h4>
                    </div>
                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombreCompleto" placeholder="Ingresa tu nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="numeroTelefonico" class="form-label">Número telefónico</label>
                        <input type="tel" class="form-control" id="numeroTelefonico" placeholder="Ingresa tu número telefónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correoElectronico" placeholder="Ingresa tu correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="pregunta" class="form-label">Su pregunta</label>
                        <textarea class="form-control" id="pregunta" rows="4" placeholder="Escribe tu pregunta aquí..." required></textarea>
                    </div>                     
                    <div class="text-center">
                        <button type="submit" class="btn btn-uno">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

        <!-- Sección #1 -->
        <!--
    <section class="bg-light py-5">
        <div class="container">
            <article>
                <h2 class="text-center fw-bold mb-5">Sección #1</h2>

            </article>
        </div>
    </section>
-->
        <!-- Sección #2 
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Sección #2</h2>
        </div>
    </section>
-->
</main>