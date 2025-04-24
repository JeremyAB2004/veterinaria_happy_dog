$('#formRegistro').on('submit', function(e) {
    e.preventDefault();


    var datosFormulario = {
        nombre: $('#nombre').val(),
        primer_apellido: $('#primer_apellido').val(),
        segundo_apellido: $('#segundo_apellido').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val(),
        password: $('#password').val()
    };

    var data = new FormData();

    data.append("datos",JSON.stringify(datosFormulario) ); 

    $.ajax({

        url:"ajax/registro.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",  

        success: function(response){

            console.log(response);

            if(response.status == 'success'){ //obj.length
                $('#mensajeRegistro').html('<p style="color: green;">Usuario registrado correctamente 🎉, por favor revise su correo</p>');
                $('#formRegistro')[0].reset();
            } else {
                $('#mensajeRegistro').html('<p style="color: red;">Error: ' + response.message + '</p>');
            }
        },
        error: function() {
            $('#mensajeRegistro').html('<p style="color: red;">Error al conectar con el servidor.</p>');
        }
    });
});