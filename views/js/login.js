$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        const datos = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            type: 'POST',
            url: 'ajax/login.ajax.php',
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response.ok) {
                    //alert('Bienvenido ' + response.nombre);
                    Swal.fire({
                        icon: 'success',
                        title: 'Ingreso exitoso!',
                        text: 'Bienvenido ' + response.nombre,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'inicio'; // O a donde quieras redirigir
                    });
                    //window.location.href = 'inicio'; // redireccionar a inicio
                } else {
                    //alert(response.mensaje);
                    Swal.fire({
                        icon: 'error',
                        title: '¡Ha ocurrido un error!',
                        text: response.mensaje,
                    });
                }
            },
            error: function () {
                alert('Error de conexión con el servidor.');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    
    togglePassword.addEventListener('click', function() {
        // Cambiar el tipo de input
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Cambiar el icono
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});