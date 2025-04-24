<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estadísticas</li>
            </ol>
        </div>
    </nav>
    
    <!-- Sección: Estadísticas -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Estadísticas de Happy Dog</h2>
            <p class="text-center">Visualiza estadísticas relevantes sobre el desempeño de la clínica.</p>
            
            <!-- Tarjetas de resumen -->
            <div class="row mb-5">
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Usuarios</h5>
                            <p class="card-text display-6" id="totalUsuarios">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-success">
                        <div class="card-body text-center">
                            <h5 class="card-title">Administradores</h5>
                            <p class="card-text display-6" id="totalAdmin">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-info">
                        <div class="card-body text-center">
                            <h5 class="card-title">Veterinarios</h5>
                            <p class="card-text display-6" id="totalVeterinarios">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-warning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text display-6" id="totalClientes">0</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Segunda fila de tarjetas -->
            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-danger">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Mascotas</h5>
                            <p class="card-text display-6" id="totalMascotas">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-secondary">
                        <div class="card-body text-center">
                            <h5 class="card-title">Edad Promedio Mascotas</h5>
                            <p class="card-text display-6" id="edadPromedio">0</p>
                            <small class="text-muted">años</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Gráficos -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center">Distribución de Usuarios por Rol</h5>
                            <canvas id="chartRoles" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center">Distribución de Edades de Mascotas</h5>
                            <canvas id="chartEdades" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Incluir Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Incluir nuestro archivo JS -->
<script src="views/js/admin-estadisticas.js"></script>