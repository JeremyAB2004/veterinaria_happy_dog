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
    <!-- Sección: Reportes -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Reportes</h2>
            <p class="text-center">Genera y consulta reportes detallados de las actividades realizadas.</p>
            <form>
                <div class="mb-3">
                    <label for="tipo-reporte" class="form-label">Seleccionar tipo de reporte</label>
                    <select class="form-control" id="tipo-reporte">
                        <option>Pacientes atendidos</option>
                        <option>Ingresos mensuales</option>
                        <option>Servicios más usados</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-uno">Generar Reporte</button>
            </form>
        </div>
    </section>
</main>