$(document).ready(function () {
    $("#formBlog").submit(function (event) {
        event.preventDefault();

        let data = {
            Tipo: "GuardarBlog",
            titulo: $("#titulo").val(),
            contenido: $("#contenido").val(),
            autor: $("#autor").val()
        };

        $.ajax({
            url: "ajax/blog.ajax.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status === "ok") {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Blog publicado exitosamente',
                        confirmButtonColor: 'var(--primary-color)'
                    });
                    $("#formBlog")[0].reset();
                    cargarBlogs();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo publicar el blog',
                        confirmButtonColor: 'var(--primary-color)'
                    });
                }
            }
        });
    });

    cargarBlogs();
    
    function cargarBlogs() {
        $.ajax({
            url: "ajax/blog.ajax.php",
            method: "POST",
            data: { Tipo: "ConsultarBlogs" },
            dataType: "json",
            success: function (response) {
                $("#lista-blogs #blogs-container").empty();
    
                if (!Array.isArray(response) || response.length === 0) {
                    $("#lista-blogs #blogs-container").append(`
                        <div style="text-align: center; padding: 30px;">
                            <img src="/api/placeholder/150/150" alt="No hay blogs" style="opacity: 0.5; margin-bottom: 15px;">
                            <p style="color: #888; font-size: 18px;">No hay blogs publicados aún.</p>
                        </div>
                    `);
                    return;
                }
    
                response.forEach((blog, index) => {
                    $("#lista-blogs #blogs-container").append(`
                        <article style="animation-delay: ${index * 0.1}s">
                            <h2>${blog.titulo}</h2>
                            <h4><i class="fas fa-user-circle"></i> Por: ${blog.autor} | <i class="far fa-calendar-alt"></i> ${blog.fecha_publicacion}</h4>
                            <p>${blog.contenido}</p>
                        </article>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al cargar los blogs',
                    confirmButtonColor: 'var(--primary-color)'
                });
            }
        });
    }
});