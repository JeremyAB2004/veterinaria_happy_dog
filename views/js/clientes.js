$(document).ready(function () {
    console.log("Document ready");

    obtenerClientes();

    $("#btnBuscarCliente").click(function () { 
        buscarCliente();
    });
});

function obtenerClientes() {
    var data = new FormData();
    data.append("Tipo", "ObtenerClientes");
    
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener clientes:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
        }
    });
}

$("#btnAgregarCliente").click(function (event) {
    event.preventDefault();

    let data = new FormData();
    data.append("Tipo", "AgregarCliente");
    data.append("nombre", $("#nombre").val());
    data.append("correo", $("#correo").val());
    data.append("telefono", $("#telefono").val());
    data.append("direccion", $("#direccion").val());

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "ok") {
                alert("Cliente agregado exitosamente");
                $("#form-agregar-cliente")[0].reset(); // Limpia el formulario
            } else {
                alert("Error al agregar cliente: " + response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Hubo un problema con la solicitud: " + xhr.responseText);
        }
    });
});

$("#btnModificarCliente").click(function (event) {
    event.preventDefault(); 

    let data = new FormData();
    data.append("Tipo", "ActualizarCliente");
    data.append("id_cliente", $("#modificar-id").val()); 
    data.append("nombre", $("#modificar-nombre").val());
    data.append("correo", $("#modificar-correo").val());
    data.append("telefono", $("#modificar-telefono").val());
    data.append("direccion", $("#modificar-direccion").val());

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "ok") {
                alert("Cliente modificado exitosamente");
                location.reload();
            } else {
                alert("Error al modificar cliente: " + response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Hubo un problema con la solicitud: " + xhr.responseText);
        }
    });
});

function buscarCliente() {
    const id = $("#buscar-id").val();

    if (!id) {
        alert("Por favor ingresa un ID de cliente");
        return;
    }

    let data = new FormData();
    data.append("Tipo", "BuscarCliente");
    data.append("id_cliente", id);

    // Agregar el console.log para inspeccionar los datos enviados
    console.log("Datos enviados:", Object.fromEntries(data.entries()));

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response && response.nombre) {
                $('#nombre-cliente').text(response.nombre);
                $('#correo-cliente').text(response.correo);
                $('#telefono-cliente').text(response.telefono);
                $('#direccion-cliente').text(response.direccion);
                $('#datos-cliente').show();
            } else {
                alert("Cliente no encontrado.");
                $('#datos-cliente').hide();
            }
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            console.log("Respuesta del servidor:", xhr.responseText);
            alert("Hubo un problema al buscar el cliente.");
        }
    });
}