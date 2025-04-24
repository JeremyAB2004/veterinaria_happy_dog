$(document).ready(function() {
    // Cargar usuarios al iniciar la página
    cargarUsuarios();
    
    // Cargar roles para el select del modal
    cargarRoles();
    
    // Manejar el clic en el botón Guardar Cambios
    $('#btnGuardarCambios').click(function() {
        actualizarUsuario();
    });
});

function cargarUsuarios() {
    $.ajax({
        url: 'ajax/admin-usuarios.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarUsuarios'
        },
        dataType: 'json',
        success: function(response) {
            let tabla = $('#tablaUsuarios tbody');
            tabla.empty();
            
            response.forEach(usuario => {
                let fila = `
                    <tr>
                        <td>${usuario.id_usuario}</td>
                        <td>${usuario.nombre}</td>
                        <td>${usuario.primer_apellido} ${usuario.segundo_apellido}</td>
                        <td>${usuario.correo}</td>
                        <td>${usuario.telefono}</td>
                        <td>${usuario.nombre_rol}</td>
                        <td>
                            <button class="btn btn-sm btn-warning btn-editar" data-id="${usuario.id_usuario}">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </td>
                    </tr>
                `;
                tabla.append(fila);
            });
            
            // Asignar evento click a los botones de editar
            $('.btn-editar').click(function() {
                let idUsuario = $(this).data('id');
                cargarUsuarioParaEditar(idUsuario);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cargar los usuarios');
        }
    });
}

function cargarRoles() {
    $.ajax({
        url: 'ajax/admin-usuarios.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarRoles'
        },
        dataType: 'json',
        success: function(response) {
            let select = $('#rolEditar');
            select.empty();
            select.append('<option value="">Seleccione un rol</option>');
            
            response.forEach(rol => {
                select.append(`<option value="${rol.id_rol}">${rol.nombre}</option>`);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cargar los roles');
        }
    });
}

function cargarUsuarioParaEditar(idUsuario) {
    $.ajax({
        url: 'ajax/admin-usuarios.ajax.php',
        type: 'POST',
        data: {
            'action': 'cargarUsuario',
            'idUsuario': idUsuario
        },
        dataType: 'json',
        success: function(response) {
            if (response.length > 0) {
                let usuario = response[0];
                $('#idUsuarioEditar').val(usuario.id_usuario);
                $('#nombreEditar').val(usuario.nombre);
                $('#apellidosEditar').val(`${usuario.primer_apellido} ${usuario.segundo_apellido}`);
                $('#correoEditar').val(usuario.correo);
                $('#rolEditar').val(usuario.id_rol);
                
                // Mostrar el modal
                $('#editarUsuarioModal').modal('show');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al cargar el usuario');
        }
    });
}

function actualizarUsuario() {
    let idUsuario = $('#idUsuarioEditar').val();
    let idRol = $('#rolEditar').val();
    
    if (!idRol) {
        alert('Por favor seleccione un rol');
        return;
    }
    
    $.ajax({
        url: 'ajax/admin-usuarios.ajax.php',
        type: 'POST',
        data: {
            'action': 'actualizarUsuario',
            'idUsuario': idUsuario,
            'idRol': idRol
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                alert('Usuario actualizado correctamente');
                $('#editarUsuarioModal').modal('hide');
                cargarUsuarios();
            } else {
                alert('Error al actualizar el usuario: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Error al actualizar el usuario');
        }
    });
}