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
                    alert("Blog publicado exitosamente.");
                    $("#formBlog")[0].reset();
                    cargarNoticias();
                } else {
                    alert("Error al publicar el blog.");
                }
            }
        });
    });

    $(document).ready(function () {
        cargarBlogs();
    
        function cargarBlogs() {
            $.ajax({
                url: "ajax/blog.ajax.php",
                method: "POST",
                data: { Tipo: "ConsultarBlogs" },
                dataType: "json",
                success: function (response) {
                    $("#lista-blogs").empty();
        
                    if (!Array.isArray(response) || response.length === 0) {
                        $("#lista-blogs").append(`<p>No hay blogs publicados aún.</p>`);
                        return;
                    }
        
                    response.forEach(blog => {
                        $("#lista-blogs").append(`
                            <article class="mb-4">
                                <h2>${blog.titulo}</h2>
                                <h4>Por: ${blog.autor} | ${blog.fecha_publicacion}</h4>
                                <p>${blog.contenido}</p>
                            </article>
                        `);
                    });
                }
            });
        }
    });


    /*$(".convertir-noticia").click(function () {
        let idPost = $(this).data("id");

        $.ajax({
            url: "ajax/blog.ajax.php",
            method: "POST",
            data: { Tipo: "ConvertirEnNoticia", id_post: idPost },
            dataType: "json",
            success: function (response) {
                if (response.status === "ok") {
                    alert("El blog ahora es una noticia.");
                    cargarNoticias();
                } else {
                    alert("Error al actualizar la categoría.");
                }
            }
        });
    });*/
});

$.ajax({
    url: "ajax/blog.ajax.php",
    method: "POST", 
    data: { Tipo: "ConsultarBlogs" }, 
    dataType: "json",
    success: function (response) {
        console.log("Blogs obtenidos:", response);

        if (!Array.isArray(response)) {
            console.error("La respuesta no es un JSON válido:", response);
            alert("Error al obtener los blogs. Verifica la consola.");
            return;
        }

        $("#lista-blogs").empty();

        if (response.length === 0) {
            $("#lista-blogs").append(`<p>No hay blogs publicados aún.</p>`);
            return;
        }

        response.forEach(blog => {
            $("#lista-blogs").append(`
                <article class="mb-4">
                    <h2>${blog.titulo}</h2>
                    <h4>Por: ${blog.autor} | ${blog.fecha_publicacion}</h4>
                    <p>${blog.contenido}</p>
                </article>
            `);
        });
    },
    error: function (xhr, status, error) {
        console.error("Error en la solicitud AJAX:", xhr.responseText);
        alert("Hubo un problema al cargar los blogs.");
    }
});