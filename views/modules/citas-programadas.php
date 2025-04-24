<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Citas Programadas</li>
            </ol>
        </div>
    </nav>

    <!-- Sección: Citas Programadas -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center my-4">Citas Programadas</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Motivo</th>
                        <th>Estado</th>
                        <th>Notas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="listaCitas">
                    <!-- Aquí se cargarán las citas programadas dinámicamente -->
                </tbody>
            </table>
        </div>
    </section>
</main>

<script src="views/js/citas.js"></script>