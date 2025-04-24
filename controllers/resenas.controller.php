<?php

require_once "../models/resenas.model.php";

class ResenasController {

    /*=============================================
    =            CARGAR RESEÑAS            =
    =============================================*/
    
    static public function ctrCargarResenas() {
        $response = ResenasModel::mdlCargarResenas();
        return $response;
    }
    
    /*=============================================
    =            PUBLICAR RESEÑA            =
    =============================================*/
    
    static public function ctrPublicarResena($nombre, $experiencia, $calificacion) {
        $response = ResenasModel::mdlPublicarResena($nombre, $experiencia, $calificacion);
        return $response;
    }
}