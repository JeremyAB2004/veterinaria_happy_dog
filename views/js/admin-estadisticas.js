$(document).ready(function() {
    // Cargar estadísticas al iniciar la página
    cargarEstadisticas();
});

function cargarEstadisticas() {
    $.ajax({
        url: 'ajax/admin-estadisticas.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarEstadisticas'
        },
        dataType: 'json',
        success: function(response) {
            // Actualizar los valores en las tarjetas
            $('#totalUsuarios').text(response.totalUsuarios);
            $('#totalAdmin').text(response.totalAdmin);
            $('#totalVeterinarios').text(response.totalVeterinarios);
            $('#totalClientes').text(response.totalClientes);
            $('#totalMascotas').text(response.totalMascotas);
            $('#edadPromedio').text(parseFloat(response.edadPromedioMascotas).toFixed(1));
            
            // Crear gráfico de distribución de roles
            crearChartRoles(response.distribucionRoles);
            
            // Crear gráfico de distribución de edades
            crearChartEdades(response.distribucionEdades);
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cargar las estadísticas');
        }
    });
}

function crearChartRoles(data) {
    const ctx = document.getElementById('chartRoles').getContext('2d');
    
    // Preparar datos para el gráfico
    const labels = data.map(item => item.nombre_rol);
    const valores = data.map(item => item.total);
    const colores = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];
    
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: valores,
                backgroundColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function crearChartEdades(data) {
    const ctx = document.getElementById('chartEdades').getContext('2d');
    
    // Preparar datos para el gráfico
    const labels = data.map(item => item.rango_edad);
    const valores = data.map(item => item.total);
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Mascotas',
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
}