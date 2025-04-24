<?php
require_once "connection.php";

class BlogModel {

    public static function mdlObtenerBlogs() {
        $stmt = Connection::connect()->prepare("
            SELECT id_post, titulo, contenido, autor, fecha_publicacion, categoria 
            FROM blog_noticias
            ORDER BY fecha_publicacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mdlGuardarBlog($datos) {
        $stmt = Connection::connect()->prepare("
            INSERT INTO blog_noticias (titulo, contenido, categoria, autor) 
            VALUES (:titulo, :contenido, :categoria, :autor)
        ");
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":autor", $datos["autor"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    /*public static function mdlConvertirEnNoticia($id_post) {
        $stmt = Connection::connect()->prepare("
            UPDATE blog_noticias SET categoria = 'Noticia' WHERE id_post = :id_post
        ");
        $stmt->bindParam(":id_post", $id_post, PDO::PARAM_INT);
    
        return $stmt->execute();
    }

    public static function mdlObtenerNoticias() {
        $stmt = Connection::connect()->prepare("
            SELECT id_post, titulo, contenido, autor, fecha_publicacion 
            FROM blog_noticias 
            WHERE categoria = 'Noticia' 
            ORDER BY fecha_publicacion DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
}
?>