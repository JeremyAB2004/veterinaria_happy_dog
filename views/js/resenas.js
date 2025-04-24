$(document).ready(function() {
    // Cargar reseñas al iniciar la página
    cargarResenas();
    
    // Manejar el envío del formulario
    $('#formPublicarExperiencia').submit(function(e) {
        e.preventDefault();
        publicarResena();
    });
});

function cargarResenas() {
    $.ajax({
        url: 'ajax/resenas.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarResenas'
        },
        dataType: 'json',
        success: function(response) {
            let contenedor = $('#listaResenas');
            contenedor.empty();
            
            if (response.length === 0) {
                contenedor.html('<p class="text-center">No hay reseñas disponibles todavía.</p>');
                return;
            }
            
            response.forEach(resena => {
                let estrellas = '';
                for (let i = 1; i <= 5; i++) {
                    estrellas += i <= resena.calificacion 
                        ? '<i class="fas fa-star text-warning"></i>' 
                        : '<i class="far fa-star text-warning"></i>';
                }
                
                let card = `
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title">${resena.nombre_cliente}</h5>
                                    <div>${estrellas}</div>
                                </div>
                                <p class="card-text">${resena.experiencia}</p>
                                <small class="text-muted">${formatearFecha(resena.fecha_publicacion)}</small>
                            </div>
                        </div>
                    </div>
                `;
                contenedor.append(card);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
            $('#listaResenas').html('<p class="text-danger">Error al cargar las reseñas.</p>');
        }
    });
}

function publicarResena() {
    let nombre = $('#nombreCliente').val();
    let experiencia = $('#experienciaCliente').val();
    let calificacion = $('#calificacion').val();
    
    if (!nombre || !experiencia || !calificacion) {
        alert('Por favor complete todos los campos');
        return;
    }
    
    $.ajax({
        url: 'ajax/resenas.ajax.php',
        type: 'POST',
        data: {
            'action': 'publicarResena',
            'nombre': nombre,
            'experiencia': experiencia,
            'calificacion': calificacion
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Mostrar mensaje de éxito
                $('#mensajeExito').removeClass('d-none');
                
                // Limpiar formulario
                $('#formPublicarExperiencia')[0].reset();
                
                // Recargar reseñas después de 2 segundos
                setTimeout(cargarResenas, 2000);
                
                // Ocultar mensaje después de 5 segundos
                setTimeout(() => $('#mensajeExito').addClass('d-none'), 5000);
            } else {
                alert('Error al publicar la reseña: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al publicar la reseña');
        }
    });
}

function formatearFecha(fechaString) {
    const fecha = new Date(fechaString);
    return fecha.toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}