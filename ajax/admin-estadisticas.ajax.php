<?php

require_once "../controllers/admin-estadisticas.controller.php";
require_once "../models/admin-estadisticas.model.php";

class AjaxEstadisticas {

    public function ajaxCargarEstadisticas() {
        $response = EstadisticasController::ctrCargarEstadisticas();
        echo json_encode($response);
    }
}

if(isset($_POST['action'])) {
    $ajax = new AjaxEstadisticas();
    
    switch($_POST['action']) {
        case 'cargarEstadisticas':
            $ajax->ajaxCargarEstadisticas();
            break;
    }
}