<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes agregar</li>
            </ol>
        </div>
    </nav>
    
    <!-- Sección: Agregar Cliente -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Agregar Cliente</h2>
            <form id="form-agregar-cliente">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" required>
                </div>
                <button type="button" class="btn btn-uno" id="btnAgregarCliente">Agregar Cliente</button>
            </form>
        </div>
    </section>
</main>

<script src="views/js/clientes.js"></script>