<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
require_once "../controllers/blog.controller.php";

if (!isset($_POST["Tipo"])) {
    echo json_encode(["error" => "No se recibió un tipo de solicitud"]);
    exit;
}

if ($_POST["Tipo"] == "ConsultarBlogs") {
    $blogs = BlogController::ctrObtenerBlogs();
    echo json_encode($blogs ?: []);
    exit;
}

if ($_POST["Tipo"] == "GuardarBlog") {
    $datos = [
        "titulo" => $_POST["titulo"],
        "contenido" => $_POST["contenido"],
        "categoria" => "Blog", // Siempre inicia como blog
        "autor" => $_POST["autor"]
    ];
    $resultado = BlogController::ctrGuardarBlog($datos);
    echo json_encode(["status" => $resultado ? "ok" : "error"]);
    exit;
}

if ($_POST["Tipo"] == "ConsultarBlogs" || $_POST["Tipo"] == "ConsultarNoticias") {
    $blogs = BlogController::ctrObtenerBlogs();
    echo json_encode($blogs ?: []);
    exit;
}
echo json_encode(["error" => "Tipo de solicitud inválido"]);
exit;