/*
function registrarMascota(data) {
    $.ajax({
        url: "ajax/mascotas2.ajax.php",
        method: "POST",
        data: {
            datos: JSON.stringify(data),
            accion: "insertar"
        },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                alert(response.message);
                // Recargar lista u otra lógica
            } else {
                alert(response.message);
            }
        },
        error: function (error) {
            console.error("Error en AJAX:", error);
        }
    });
}

function obtenerMascotas(id_cliente) {
    $.ajax({
        url: "ajax/mascotas2.ajax.php",
        method: "POST",
        data: {
            datos: JSON.stringify({ id_cliente }),
            accion: "obtener"
        },
        dataType: "json",
        success: function (mascotas) {
            console.log("Mascotas del cliente:", mascotas);
            // Aquí podrías llenar una tabla o una vista
        },
        error: function (error) {
            console.error("Error al obtener mascotas:", error);
        }
    });
}*/



$(document).ready(function () {
  $("#formRegistrarMascota").submit(function (e) {
      e.preventDefault();

      // Show loading state
      const submitBtn = $(this).find('button[type="submit"]');
      submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Procesando...');

      const data = {
          nombre: $("#nombreMascota").val().trim(),
          especie: $("#especieMascota").val().trim(),
          raza: $("#razaMascota").val().trim(),
          edad: $("#edadMascota").val().trim(),
          id_usuario: $("#id_usuario").val().trim()
      };

      $.ajax({
          url: "ajax/mascotas2.ajax.php",
          method: "POST",
          dataType: "json",
          data: {
              datos: JSON.stringify(data),
              accion: "insertar"
          },
          success: function (response) {
              if (response.status === "success") {
                  // Show success message
                  Swal.fire({
                      icon: 'success',
                      title: 'Éxito',
                      text: response.message,
                      timer: 2000,
                      showConfirmButton: false
                  });
                  
                  $("#formRegistrarMascota")[0].reset();
              } else {
                  // Show error message from server
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: response.message
                  });
              }
          },
          error: function (xhr, status, error) {
              // Show AJAX error
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Ocurrió un error al comunicarse con el servidor: ' + error
              });
          },
          complete: function () {
              // Reset button state
              submitBtn.prop('disabled', false).html('Registrar Mascota');
          }
      });
  });
});
