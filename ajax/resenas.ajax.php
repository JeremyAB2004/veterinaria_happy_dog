<?php

require_once "../controllers/resenas.controller.php";
require_once "../models/resenas.model.php";

class AjaxResenas {

    /*=============================================
    =            CARGAR RESEÑAS            =
    =============================================*/
    
    public function ajaxCargarResenas() {
        $response = ResenasController::ctrCargarResenas();
        echo json_encode($response);
    }
    
    /*=============================================
    =            PUBLICAR RESEÑA            =
    =============================================*/
    
    public $nombre;
    public $experiencia;
    public $calificacion;
    
    public function ajaxPublicarResena() {
        $response = ResenasController::ctrPublicarResena(
            $this->nombre,
            $this->experiencia,
            $this->calificacion
        );
        echo json_encode($response);
    }
}

/*=============================================
=            EJECUTAR AJAX            =
=============================================*/

if(isset($_POST['action'])) {
    $ajax = new AjaxResenas();
    
    switch($_POST['action']) {
        case 'cargarResenas':
            $ajax->ajaxCargarResenas();
            break;
        case 'publicarResena':
            $ajax->nombre = $_POST['nombre'];
            $ajax->experiencia = $_POST['experiencia'];
            $ajax->calificacion = $_POST['calificacion'];
            $ajax->ajaxPublicarResena();
            break;
    }
}