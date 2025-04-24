<?php
require_once "../models/citas.model.php";

class CitasController {

    static public function ctrAgendarCita($datos) {
        $table = "citas";
        return CitasModel::mdlAgendarCita($table, $datos);
    }

    static public function ctrConsultarCitas($filtro, $valor) {
        $table = "citas";
        return CitasModel::mdlConsultarCitas($table, $filtro, $valor);
    }

    static public function ctrModificarCita($datos) {
        $table = "citas";
        return CitasModel::mdlModificarCita($table, $datos);
    }
}