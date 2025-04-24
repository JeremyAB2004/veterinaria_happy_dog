
$(document).ready(function () {
    cargarClientes();
    cargarMascotas();

    // Al seleccionar una mascota, cargar automáticamente el cliente asociado
    $("#id_cliente").change(function () {
        let idCliente = $(this).val();
    
        if (!idCliente) return;
    
        $.ajax({
            url: "ajax/mascotas.ajax.php",
            method: "POST",
            data: { Tipo: "ObtenerMascotasPorCliente", id_cliente: idCliente },
            dataType: "json",
            success: function (response) {
                console.log("Mascotas obtenidas:", response);
    
                $("#id_mascota").empty().append('<option value="">Seleccione una mascota</option>');
    
                if (!Array.isArray(response) || response.length === 0) {
                    alert("No hay mascotas asociadas a este cliente.");
                    return;
                }
    
                response.forEach(mascota => {
                    $("#id_mascota").append(`<option value="${mascota.id_mascota}">${mascota.nombre_mascota}</option>`);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar mascotas:", error);
                alert("Error al cargar mascotas.");
            }
        });
    });
});

function cargarClientes() {
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: { Tipo: "ObtenerClientes" },
        dataType: "json",
        success: function (response) {
            $("#id_cliente").empty().append('<option value="">Seleccione un cliente</option>');
            response.forEach(cliente => {
                $("#id_cliente").append(`<option value="${cliente.id_cliente}">${cliente.nombre}</option>`);
            });
        },
        error: function () {
            alert("Error al cargar clientes.");
        }
    });
}

function cargarMascotas() {
    $.ajax({
        url: "ajax/mascotas.ajax.php", // Cargamos mascotas desde su propio archivo
        method: "POST",
        data: { Tipo: "ObtenerMascotas" },
        dataType: "json",
        success: function (response) {
            console.log("Mascotas obtenidas:", response);

            if (!Array.isArray(response) || response.length === 0) {
                alert("No hay mascotas registradas.");
                return;
            }

            $("#id_mascota").empty().append('<option value="">Seleccione una mascota</option>');
            response.forEach(mascota => {
                $("#id_mascota").append(`<option value="${mascota.id_mascota}">${mascota.nombre_mascota}</option>`);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar mascotas:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Error al cargar mascotas desde la base de datos.");
        }
    });
}


$("#btnAgendarCita").click(function (event) {
    event.preventDefault();

    let data = new FormData();
    data.append("Tipo", "AgendarCita");
    data.append("id_cliente", $("#id_cliente").val());
    data.append("id_mascota", $("#id_mascota").val());
    data.append("fecha_cita", $("#fecha_cita").val());
    data.append("motivo", $("#motivo").val());
    data.append("estado", $("#estado").val());
    data.append("notas", $("#notas").val());

    $.ajax({
        url: "ajax/citas.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "ok") {
                alert("Cita agendada exitosamente");
                $("#form-agendar-cita")[0].reset(); // Limpia el formulario después de la cita
            } else {
                alert("Error al agendar cita: " + response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Hubo un problema al agendar la cita.");
        }
    });
});

$(document).ready(function () {
    cargarCitas();

    function cargarCitas() {
        $.ajax({
            url: "ajax/citas.ajax.php",
            method: "POST",
            data: { Tipo: "ConsultarCitas", filtro: "todos", valor: "" },
            dataType: "json",
            success: function (response) {
                console.log("Citas obtenidas:", response);
                $("#listaCitas").empty();

                if (response.length > 0) {
                    response.forEach(cita => {
                        $("#listaCitas").append(`
                            <tr>
                                <td>${cita.fecha_cita}</td>
                                <td>${cita.motivo}</td>
                                <td>${cita.estado}</td>
                                <td>${cita.notas}</td>
                                <td>${cita.nombre_cliente}</td>
                                <td>${cita.nombre_mascota}</td>
                            </tr>
                        `);
                    });
                } else {
                    $("#listaCitas").append(`<tr><td colspan="6" class="text-center">No hay citas programadas.</td></tr>`);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar citas:", error);
                alert("Hubo un problema al obtener las citas.");
            }
        });
    }
});

$("#btnBuscarCita").click(function () {
    let idCita = $("#buscarCita").val();

    if (!idCita) {
        alert("Por favor ingresa un ID de cita válido.");
        return;
    }

    $.ajax({
        url: "ajax/citas.ajax.php",
        method: "POST",
        data: { Tipo: "ConsultarCitaPorId", id_cita: idCita },
        dataType: "json",
        success: function (response) {
            console.log("Datos de la cita:", response);

            if (!response || response.error) {
                alert("No se encontró la cita.");
                $("#detalleCita").hide();
            } else {
                $("#id_cita").val(response.id_cita);
                $("#fecha_cita").val(response.fecha_cita);
                $("#motivo").val(response.motivo);
                $("#estado").val(response.estado);
                $("#notas").val(response.notas);
                $("#detalleCita").show();

                // Mostrar dueño y mascota sin permitir cambios
                $("#nombre_cliente").text(response.nombre_cliente);
                $("#nombre_mascota").text(response.nombre_mascota);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al buscar cita:", error);
            alert("Hubo un problema al buscar la cita.");
        }
    });
});

$("#btnModificarCita").click(function () {
    let data = new FormData();
    data.append("Tipo", "ModificarCita");
    data.append("id_cita", $("#id_cita").val());
    data.append("fecha_cita", $("#fecha_cita").val());
    data.append("motivo", $("#motivo").val());
    data.append("estado", $("#estado").val());
    data.append("notas", $("#notas").val());

    $.ajax({
        url: "ajax/citas.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.status === "ok") {
                alert("Cita modificada exitosamente.");
                location.reload();
            } else {
                alert("Error al modificar la cita.");
            }
        }
    });
});

$("#btnCancelarCita").click(function () {
    let confirmacion = confirm("¿Estás seguro de que deseas cancelar esta cita?");
    if (!confirmacion) return;

    let data = new FormData();
    data.append("Tipo", "ModificarCita");
    data.append("id_cita", $("#id_cita").val());
    data.append("estado", "Cancelada");

    $.ajax({
        url: "ajax/citas.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.status === "ok") {
                alert("Cita cancelada correctamente.");
                location.reload();
            } else {
                alert("Error al cancelar la cita.");
            }
        }
    });
});