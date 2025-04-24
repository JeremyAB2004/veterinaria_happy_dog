<?php
header('Content-Type: application/json');
require_once "../controllers/noticias.controller.php";

$noticias = NoticiasController::ctrObtenerNoticias();
 json_encode($noticias ?: []);
?>