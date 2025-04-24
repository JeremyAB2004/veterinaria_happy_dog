<!-- Contenido de la página -->
<main>
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes consulta</li>
            </ol>
        </div>
    </nav>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Consultar Cliente</h2>
            <form id="form-buscar-cliente">
                <div class="mb-3">
                    <label for="buscar-identificacion" class="form-label">Identificación</label>
                    <input type="text" class="form-control" id="buscar-id" required>
                </div>
                <button type="button" class="btn btn-uno" id="btnBuscarCliente">Buscar Cliente</button>
            </form>
            <div id="datos-cliente" class="mt-4" style="display: none;">
                <h4>Datos del Cliente:</h4>
                <p><strong>Nombre:</strong> <span id="nombre-cliente"></span></p>
                <p><strong>Correo:</strong> <span id="correo-cliente"></span></p>
                <p><strong>Teléfono:</strong> <span id="telefono-cliente"></span></p>
                <p><strong>Dirección:</strong> <span id="direccion-cliente"></span></p>
            </div>
        </div>
    </section>
</main>
<script src="views/js/clientes.js"></script>