<?php

class EstadisticasController {

    static public function ctrCargarEstadisticas() {
        $response = EstadisticasModel::mdlCargarEstadisticas();
        return $response;
    }
}