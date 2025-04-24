<?php
require_once "../models/noticias.model.php";

class NoticiasController {
    public static function ctrObtenerNoticias() {
        return NoticiasModel::mdlObtenerNoticias();
    }
}
?>