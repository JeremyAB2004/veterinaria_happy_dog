<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes modificar</li>
            </ol>
        </div>
    </nav>

    <!-- Sección: Modificar Cliente -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Modificar Cliente</h2>
            <form id="form-modificar-cliente">
                <div class="mb-3">
                    <label for="modificar-id" class="form-label">ID Cliente</label>
                    <input type="text" class="form-control" id="modificar-id" required>
                </div>
                <div class="mb-3">
                    <label for="modificar-nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="modificar-nombre">
                </div>
                <div class="mb-3">
                    <label for="modificar-correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="modificar-correo">
                </div>
                <div class="mb-3">
                    <label for="modificar-telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="modificar-telefono">
                </div>
                <div class="mb-3">
                    <label for="modificar-direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="modificar-direccion">
                </div>
                <button type="button" class="btn btn-uno" id="btnModificarCliente">Modificar Cliente</button>
            </form>
        </div>
    </section>
</main>

<script src="views/js/clientes.js"></script>