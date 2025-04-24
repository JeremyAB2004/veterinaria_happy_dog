$(document).ready(function() {
    // Variables globales
    let paginaActual = 1;
    let filtroActual = 'todas';
    let resenaSeleccionada = null;
    
    // Cargar reseñas al iniciar la página
    cargarResenas(paginaActual, filtroActual);
    
    // Manejar filtros de estado
    $('.btn-group [data-filter]').click(function() {
        $('.btn-group [data-filter]').removeClass('active');
        $(this).addClass('active');
        
        filtroActual = $(this).data('filter');
        paginaActual = 1;
        cargarResenas(paginaActual, filtroActual);
    });
    
    // Manejar clic en botón de detalles
    $(document).on('click', '.btn-detalle', function() {
        const idResena = $(this).data('id');
        cargarDetalleResena(idResena);
    });
    
    // Manejar clic en botones de cambio rápido de estado
    $(document).on('click', '.btn-aprobar', function() {
        const idResena = $(this).data('id');
        cambiarEstadoResena(idResena, 'aprobado');
    });
    
    $(document).on('click', '.btn-rechazar', function() {
        const idResena = $(this).data('id');
        cambiarEstadoResena(idResena, 'rechazado');
    });
    
    // Manejar clic en guardar cambios del modal
    $('#btnGuardarEstado').click(function() {
        if (resenaSeleccionada) {
            const nuevoEstado = $('#modalEstado').val();
            cambiarEstadoResena(resenaSeleccionada, nuevoEstado);
        }
    });
    
    // Manejar paginación
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        if (!$(this).parent().hasClass('disabled')) {
            const pagina = $(this).data('pagina');
            if (pagina) {
                paginaActual = pagina;
                cargarResenas(paginaActual, filtroActual);
            }
        }
    });
});

function cargarResenas(pagina, filtro) {
    $.ajax({
        url: 'ajax/resenas-revision.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarResenasRevision',
            'pagina': pagina,
            'filtro': filtro
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'error') {
                alert(response.message);
                return;
            }
            
            const resenas = response.data;
            const totalPaginas = response.totalPaginas;
            
            renderizarTablaResenas(resenas);
            renderizarPaginacion(pagina, totalPaginas);
        },
        error: function(xhr, status, error) {
            console.error(error);
            $('#tablaResenas').html('<tr><td colspan="7" class="text-center text-danger">Error al cargar las reseñas.</td></tr>');
        }
    });
}

function renderizarTablaResenas(resenas) {
    let html = '';
    
    if (resenas.length === 0) {
        html = '<tr><td colspan="7" class="text-center">No hay reseñas para mostrar</td></tr>';
    } else {
        resenas.forEach(resena => {
            // Clases y colores según el estado
            let claseEstado = '';
            let textoEstado = '';
            
            switch(resena.estado) {
                case 'pendiente':
                    claseEstado = 'bg-warning text-dark';
                    textoEstado = 'Pendiente';
                    break;
                case 'aprobado':
                    claseEstado = 'bg-success text-white';
                    textoEstado = 'Aprobado';
                    break;
                case 'rechazado':
                    claseEstado = 'bg-danger text-white';
                    textoEstado = 'Rechazado';
                    break;
            }
            
            // Estrellas para la calificación
            let estrellas = '';
            for (let i = 1; i <= 5; i++) {
                estrellas += i <= resena.calificacion 
                    ? '<i class="fas fa-star text-warning"></i>' 
                    : '<i class="far fa-star text-warning"></i>';
            }
            
            // Texto truncado de la experiencia
            const experienciaTruncada = resena.experiencia.length > 50 
                ? resena.experiencia.substring(0, 50) + '...' 
                : resena.experiencia;
            
            html += `
                <tr>
                    <td>${resena.id_reseña}</td>
                    <td>${resena.nombre_cliente}</td>
                    <td>${experienciaTruncada}</td>
                    <td>${estrellas}</td>
                    <td>${formatearFecha(resena.fecha_publicacion)}</td>
                    <td><span class="badge ${claseEstado}">${textoEstado}</span></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-info btn-detalle" data-id="${resena.id_reseña}" data-bs-toggle="modal" data-bs-target="#modalDetalleResena">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-aprobar" data-id="${resena.id_reseña}">
                                <i class="fas fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-rechazar" data-id="${resena.id_reseña}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        });
    }
    
    $('#tablaResenas').html(html);
}

function renderizarPaginacion(paginaActual, totalPaginas) {
    let html = '';
    
    // Botón "Anterior"
    html += `
        <li class="page-item ${paginaActual === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" data-pagina="${paginaActual - 1}" aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    `;
    
    // Páginas numeradas
    for (let i = 1; i <= totalPaginas; i++) {
        html += `
            <li class="page-item ${i === paginaActual ? 'active' : ''}">
                <a class="page-link" href="#" data-pagina="${i}">${i}</a>
            </li>
        `;
    }
    
    // Botón "Siguiente"
    html += `
        <li class="page-item ${paginaActual === totalPaginas ? 'disabled' : ''}">
            <a class="page-link" href="#" data-pagina="${paginaActual + 1}" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    `;
    
    $('#paginacionResenas').html(html);
}

function cargarDetalleResena(idResena) {
    $.ajax({
        url: 'ajax/resenas-revision.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarDetalleResena',
            'idResena': idResena
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'error') {
                alert(response.message);
                return;
            }
            
            const resena = response.data;
            resenaSeleccionada = resena.id_reseña;
            
            // Llenar datos del modal
            $('#modalNombreCliente').text(resena.nombre_cliente);
            $('#modalExperiencia').text(resena.experiencia);
            $('#modalFecha').text(formatearFecha(resena.fecha_publicacion));
            $('#modalEstado').val(resena.estado);
            
            // Mostrar estrellas para la calificación
            let estrellas = '';
            for (let i = 1; i <= 5; i++) {
                estrellas += i <= resena.calificacion 
                    ? '<i class="fas fa-star text-warning"></i>' 
                    : '<i class="far fa-star text-warning"></i>';
            }
            $('#modalCalificacion').html(estrellas);
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cargar el detalle de la reseña');
        }
    });
}

function cambiarEstadoResena(idResena, nuevoEstado) {
    $.ajax({
        url: 'ajax/resenas-revision.ajax.php',
        type: 'POST',
        data: {
            'action': 'cambiarEstadoResena',
            'idResena': idResena,
            'estado': nuevoEstado
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Cerrar modal si está abierto
                $('#modalDetalleResena').modal('hide');
                
                // Mostrar notificación
                const toast = `
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Notificación</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ${response.message}
                            </div>
                        </div>
                    </div>
                `;
                $('body').append(toast);
                
                // Eliminar notificación después de 3 segundos
                setTimeout(function() {
                    $('.toast').toast('hide');
                    setTimeout(function() {
                        $('.toast').remove();
                    }, 500);
                }, 3000);
                
                // Recargar tabla
                cargarResenas(paginaActual, filtroActual);
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cambiar el estado de la reseña');
        }
    });
}

function formatearFecha(fechaString) {
    const fecha = new Date(fechaString);
    return fecha.toLocaleDateString('es-ES', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}