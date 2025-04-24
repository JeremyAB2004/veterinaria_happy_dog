<?php

require_once "../controllers/resenas-revision.controller.php";
require_once "../models/resenas-revision.model.php";

class AjaxResenasRevision {

    /*=============================================
    =            CARGAR RESEÑAS PARA REVISIÓN     =
    =============================================*/
    
    public $pagina;
    public $filtro;
    
    public function ajaxCargarResenasRevision() {
        $response = ResenasRevisionController::ctrCargarResenasRevision(
            $this->pagina,
            $this->filtro
        );
        echo json_encode($response);
    }
    
    /*=============================================
    =            CARGAR DETALLE DE RESEÑA        =
    =============================================*/
    
    public $idResena;
    
    public function ajaxCargarDetalleResena() {
        $response = ResenasRevisionController::ctrCargarDetalleResena($this->idResena);
        echo json_encode($response);
    }
    
    /*=============================================
    =            CAMBIAR ESTADO DE RESEÑA        =
    =============================================*/
    
    public $estado;
    
    public function ajaxCambiarEstadoResena() {
        $response = ResenasRevisionController::ctrCambiarEstadoResena(
            $this->idResena,
            $this->estado
        );
        echo json_encode($response);
    }
}

/*=============================================
=            EJECUTAR AJAX                    =
=============================================*/

if(isset($_POST['action'])) {
    $ajax = new AjaxResenasRevision();
    
    switch($_POST['action']) {
        case 'cargarResenasRevision':
            $ajax->pagina = isset($_POST['pagina']) ? intval($_POST['pagina']) : 1;
            $ajax->filtro = isset($_POST['filtro']) ? $_POST['filtro'] : 'todas';
            $ajax->ajaxCargarResenasRevision();
            break;
            
        case 'cargarDetalleResena':
            $ajax->idResena = isset($_POST['idResena']) ? intval($_POST['idResena']) : 0;
            $ajax->ajaxCargarDetalleResena();
            break;
            
        case 'cambiarEstadoResena':
            $ajax->idResena = isset($_POST['idResena']) ? intval($_POST['idResena']) : 0;
            $ajax->estado = isset($_POST['estado']) ? $_POST['estado'] : 'pendiente';
            $ajax->ajaxCambiarEstadoResena();
            break;
    }
}