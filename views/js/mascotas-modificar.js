$(document).ready(function () {
    const idUsuario = $("#id_usuario").val();
    
    // Cargar las mascotas del usuario en el selector
    cargarMascotasUsuario(idUsuario);
    
    // Evento para cargar los datos de la mascota seleccionada
    $("#btnCargarMascota").click(function() {
        const idMascota = $("#selectorMascota").val();
        if (!idMascota) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor seleccione una mascota'
            });
            return;
        }
        
        cargarDatosMascota(idMascota);
    });
    
    // Evento para cancelar la edición
    $("#btnCancelarEdicion").click(function() {
        $("#formularioEdicion").hide();
        $("#seleccionMascota").show();
        $("#formEditarMascota")[0].reset();
    });
    
    // Form submission
    $("#formEditarMascota").submit(function (e) {
        e.preventDefault();
        guardarCambiosMascota();
    });
    
    // Función para cargar las mascotas del usuario
    function cargarMascotasUsuario(idUsuario) {
        $.ajax({
            url: "ajax/mascotas2.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                datos: JSON.stringify({ id_usuario: idUsuario }),
                accion: "obtener"
            },
            success: function (response) {
                if (response.status === "success" && response.data.length > 0) {
                    const selector = $("#selectorMascota");
                    selector.empty();
                    selector.append('<option value="" selected disabled>-- Seleccione --</option>');
                    
                    response.data.forEach(mascota => {
                        selector.append(`<option value="${mascota.id_mascota}">${mascota.nombre} (${mascota.especie})</option>`);
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Sin mascotas',
                        text: 'No tienes mascotas registradas. Por favor registra una mascota primero.'
                    }).then(() => {
                        window.location.href = 'registrar-mascota';
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar las mascotas: ' + error
                });
            }
        });
    }
    
    // Función para cargar los datos de una mascota específica
    function cargarDatosMascota(idMascota) {
        $.ajax({
            url: "ajax/mascotas2.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                datos: JSON.stringify({ id_mascota: idMascota }),
                accion: "obtener_una"
            },
            success: function (response) {
                if (response.status === "success") {
                    const mascota = response.data;
                    $("#id_mascota").val(mascota.id_mascota);
                    $("#nombreMascota").val(mascota.nombre);
                    $("#especieMascota").val(mascota.especie);
                    $("#razaMascota").val(mascota.raza);
                    $("#edadMascota").val(mascota.edad);
                    
                    // Mostrar formulario y ocultar selector
                    $("#seleccionMascota").hide();
                    $("#formularioEdicion").show();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos de la mascota: ' + error
                });
            }
        });
    }
    
    // Función para guardar los cambios
    function guardarCambiosMascota() {
        const submitBtn = $("#formEditarMascota").find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Guardando...');

        const data = {
            id_mascota: $("#id_mascota").val(),
            nombre: $("#nombreMascota").val().trim(),
            especie: $("#especieMascota").val().trim(),
            raza: $("#razaMascota").val().trim(),
            edad: $("#edadMascota").val().trim()
        };

        $.ajax({
            url: "ajax/mascotas2.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                datos: JSON.stringify(data),
                accion: "actualizar"
            },
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Recargar la página para actualizar los datos
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al comunicarse con el servidor: ' + error
                });
            },
            complete: function () {
                submitBtn.prop('disabled', false).html('Guardar Cambios');
            }
        });
    }
});