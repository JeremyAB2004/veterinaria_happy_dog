$(document).ready(function () {
    const idUsuario = $("#id_usuario").val();
    
    // Cargar las mascotas del usuario al iniciar
    cargarMascotasUsuario(idUsuario);
    
    // Evento para cerrar el detalle
    $("#btnCerrarDetalle").click(function() {
        $("#detalleMascota").hide();
    });
    
    // Función para cargar las mascotas del usuario
    function cargarMascotasUsuario(idUsuario) {
        $.ajax({
            url: "ajax/mascotas.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                datos: JSON.stringify({ id_usuario: idUsuario }),
                accion: "obtener_consulta"
            },
            success: function (response) {
                const tbody = $("#cuerpoTablaMascotas");
                tbody.empty();

                // Accede a los datos anidados si es necesario
                const mascotasData = response.data && response.data.data ? response.data.data : 
                response.data ? response.data : [];
                
                if (response.status === "success" && mascotasData.length > 0) {
                    mascotasData.forEach(mascota => {
                        const row = `
                            <tr data-id="${mascota.id_mascota}">
                                <td>${mascota.nombre}</td>
                                <td>${mascota.especie}</td>
                                <td>${mascota.raza || '-'}</td>
                                <td>${mascota.edad}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary btnVerHistorial">
                                        <i class="fas fa-history"></i> Ver datos
                                    </button>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                    
                    // Agregar evento a los botones de ver historial
                    $(".btnVerHistorial").click(function() {
                        const idMascota = $(this).closest("tr").data("id");
                        cargarDetalleMascota(idMascota);
                    });
                    
                } else {
                    tbody.append(`
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="fas fa-paw fa-2x mb-3"></i>
                                <p>No tienes mascotas registradas</p>
                                <a href="registrar-mascota" class="btn btn-primary btn-sm">
                                    Registrar mi primera mascota
                                </a>
                            </td>
                        </tr>
                    `);
                }
            },
            error: function (xhr, status, error) {
                $("#cuerpoTablaMascotas").html(`
                    <tr>
                        <td colspan="5" class="text-center py-4 text-danger">
                            <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                            <p>Error al cargar las mascotas</p>
                            <button class="btn btn-sm btn-outline-primary" onclick="location.reload()">
                                <i class="fas fa-sync-alt"></i> Reintentar
                            </button>
                        </td>
                    </tr>
                `);
            }
        });
    }
    
    // Función para cargar el detalle de una mascota
    function cargarDetalleMascota(idMascota) {
        // Mostrar sección de detalle
        $("#detalleMascota").show();
        $('html, body').animate({
            scrollTop: $("#detalleMascota").offset().top - 20
        }, 500);
        
        // Cargar datos básicos de la mascota
        $.ajax({
            url: "ajax/mascotas.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                datos: JSON.stringify({ id_mascota: idMascota }),
                accion: "obtener_una_consulta"
            },
            success: function (response) {
                if (response.status === "success") {
                    const mascota = response.data;
                    $("#nombreMascotaSeleccionada").text(mascota.nombre);
                    $("#detalleEspecie").text(mascota.especie);
                    $("#detalleRaza").text(mascota.raza || '-');
                    $("#detalleEdad").text(mascota.edad);
                    
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'No se pudo cargar la información de la mascota'
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al cargar los datos: ' + error
                });
            }
        });
    }
    
});