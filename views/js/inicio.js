$(document).ready(function () {
    $.ajax({
        url: "ajax/inicio.ajax.php",
        method: "GET",
        dataType: "json",
        success: function (data) {
            const $contenedor = $("#contenedorResenasAprobadas");

            if (!data || data.length === 0) {
                $contenedor.html("<p class='text-center text-muted'>Aún no hay reseñas disponibles.</p>");
                return;
            }

            data.forEach(function (resena) {
                const $tarjeta = $(`
                    <div class="col-md-4">
                        <div class="testimonial-card">
                            <p class="mb-4">"${resena.experiencia}"</p>
                            <div class="d-flex align-items-center">
                                <div class="testimonial-avatar">
                                    <img src="views/img/users/default/anonymous.png" alt="Cliente" class="img-fluid">
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">${resena.nombre}</h6>
                                    <small class="text-muted">Calificación: ${"⭐".repeat(resena.calificacion)}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                $contenedor.append($tarjeta);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar reseñas:", error);
            $("#contenedorResenasAprobadas").html("<p class='text-danger'>Error al cargar las reseñas. Inténtalo más tarde.</p>");
        }
    });
});
