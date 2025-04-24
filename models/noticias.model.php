<?php
require_once "connection.php";

class NoticiasModel {
    public static function mdlObtenerNoticias() {
        $stmt = Connection::connect()->prepare("
            SELECT id_post, titulo, contenido, autor, fecha_publicacion 
            FROM blog_noticias 
            WHERE categoria = 'Noticia' 
            ORDER BY fecha_publicacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>