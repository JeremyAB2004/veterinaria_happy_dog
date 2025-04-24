<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../models/clientes.model.php"; // Usamos el modelo que gestiona la BD

if ($_POST["Tipo"] == "ObtenerMascotas") {
    $tabla = "mascotas";
    $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY nombre_mascota ASC");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
    exit;
}

if ($_POST["Tipo"] == "ObtenerMascotasPorCliente") {
    require_once "../models/clientes.model.php";

    $tabla = "mascotas";
    $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_cliente ORDER BY nombre ASC");
    $stmt->bindParam(":id_cliente", $_POST["id_cliente"], PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
    exit;
}

echo json_encode(["error" => "Tipo de solicitud inválido"]);
exit;