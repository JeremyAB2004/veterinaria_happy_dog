$(document).ready(function () {
    cargarNoticias();

    function cargarNoticias() {
        $.ajax({
            url: "ajax/blog.ajax.php",
            method: "POST",
            data: { Tipo: "ConsultarNoticias" },
            dataType: "json",
            success: function (response) {
                $("#seccion-noticias").empty();

                if (!Array.isArray(response) || response.length === 0) {
                    $("#seccion-noticias").append(`<p>No hay noticias disponibles.</p>`);
                    return;
                }

                response.forEach(noticia => {
                    $("#seccion-noticias").append(`
                        <article class="mb-4">
                            <h2>${noticia.titulo}</h2>
                            <h4>Por: ${noticia.autor} | ${noticia.fecha_publicacion}</h4>
                            <p>${noticia.contenido}</p>
                        </article>
                    `);
                });
            }
        });
    }
});