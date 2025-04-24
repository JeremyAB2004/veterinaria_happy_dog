<?php
header("Content-Type: application/json");

require_once "database.php"; // Asegurate que devuelve $db como instancia válida

try {
    $sql = "SELECT nombre_cliente as nombre, experiencia, calificacion FROM reseñas WHERE estado = 'aprobado' ORDER BY id_reseña DESC LIMIT 6";
    $query = $db->query($sql);

    if (!$query) {
        throw new Exception("Error en la consulta: " . $db->error);
    }

    $resenas = $query->fetch_all(MYSQLI_ASSOC);
    echo json_encode($resenas);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error al obtener reseñas", "detalle" => $e->getMessage()]);
}
