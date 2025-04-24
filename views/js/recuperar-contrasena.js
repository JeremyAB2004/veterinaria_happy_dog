document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.querySelector("#email").value;
        const codigo = Math.floor(100000 + Math.random() * 900000); // código de 6 dígitos

        fetch("controllers/recuperar-contrasena.controller.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `accion=enviar_codigo&email=${encodeURIComponent(email)}&codigo=${codigo}`
        })
        .then(res => res.text())
        .then(response => {
            if (response === "correo_enviado") {
                Swal.fire({
                    icon: 'success',
                    title: '¡Correo enviado!',
                    text: 'Revisa tu bandeja para ver el código.',
                }).then(() => {
                    pedirCodigo(email, codigo);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El correo no está registrado.',
                });
            }
        });
    });

    function pedirCodigo(emailOriginal, codigoGenerado) {
        Swal.fire({
            title: 'Ingresa el código',
            html:
                `<input type="text" id="codigo" class="swal2-input" placeholder="Código de 6 dígitos">` +
                `<input type="password" id="nuevaPass" class="swal2-input" placeholder="Nueva contraseña">`,
            confirmButtonText: 'Actualizar contraseña',
            focusConfirm: false,
            preConfirm: () => {
                const codigo = document.getElementById('codigo').value;
                const nuevaPass = document.getElementById('nuevaPass').value;

                if (!codigo || !nuevaPass) {
                    Swal.showValidationMessage('Completa todos los campos');
                    return false;
                }

                if (codigo != codigoGenerado) {
                    Swal.showValidationMessage('Código incorrecto');
                    return false;
                }

                return { codigo, nuevaPass };
            }
        }).then(result => {
            if (result.isConfirmed) {
                fetch("controllers/recuperar-contrasena.controller.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `accion=actualizar_pass&email=${encodeURIComponent(emailOriginal)}&pass=${encodeURIComponent(result.value.nuevaPass)}`
                })
                .then(res => res.text())
                .then(response => {
                    if (response === "actualizado") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Contraseña actualizada',
                            text: 'Ya podés iniciar sesión con tu nueva contraseña.',
                            confirmButtonText: 'Ir al login'
                        }).then(() => {
                            window.location.href = "login"; // 🔁 Ajustá esto si tu archivo se llama distinto o está en otra carpeta
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo actualizar la contraseña.'
                        });
                    }
                });
            }            
        });
    }
});
