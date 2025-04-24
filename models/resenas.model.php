<?php

require_once "connection.php";

class ResenasModel {

    /*=============================================
    =            CARGAR RESEÑAS            =
    =============================================*/
    
    static public function mdlCargarResenas() {
        $stmt = Connection::connect()->prepare("
            SELECT * FROM reseñas 
            WHERE estado = 'aprobado'
            ORDER BY fecha_publicacion DESC
            LIMIT 6
        ");
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /*=============================================
    =            PUBLICAR RESEÑA            =
    =============================================*/
    
    static public function mdlPublicarResena($nombre, $experiencia, $calificacion) {
        $stmt = Connection::connect()->prepare("
            INSERT INTO reseñas 
            (nombre_cliente, experiencia, calificacion) 
            VALUES (:nombre, :experiencia, :calificacion)
        ");
        
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":experiencia", $experiencia, PDO::PARAM_STR);
        $stmt->bindParam(":calificacion", $calificacion, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            return array(
                "status" => "success",
                "message" => "Reseña publicada correctamente"
            );
        } else {
            return array(
                "status" => "error",
                "message" => "Error al publicar la reseña"
            );
        }
    }
}