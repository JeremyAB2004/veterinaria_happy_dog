<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../controllers/citas.controller.php";
require_once "../models/citas.model.php";

if ($_POST["Tipo"] == "AgendarCita") {
    $datos = $_POST;
    $resultado = CitasController::ctrAgendarCita($datos);
    echo json_encode(["status" => $resultado === "ok" ? "ok" : "error"]);
    exit;
}

if ($_POST["Tipo"] == "ConsultarCitaPorId") {
    $tabla = "citas";
    $stmt = Connection::connect()->prepare("
        SELECT citas.*, 
               clientes.nombre AS nombre_cliente, 
               mascotas.nombre_mascota AS nombre_mascota 
        FROM citas
        INNER JOIN clientes ON citas.id_cliente = clientes.id_cliente
        INNER JOIN mascotas ON citas.id_mascota = mascotas.id_mascota
        WHERE id_cita = :id_cita
    ");
    $stmt->bindParam(":id_cita", $_POST["id_cita"], PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: ["error" => "Cita no encontrada"]);
    exit;
}

if ($_POST["Tipo"] == "ConsultarCitas") {
    $tabla = "citas";
    $stmt = Connection::connect()->prepare("
        SELECT citas.*, clientes.nombre AS nombre_cliente, mascotas.nombre_mascota AS nombre_mascota 
        FROM citas
        INNER JOIN clientes ON citas.id_cliente = clientes.id_cliente
        INNER JOIN mascotas ON citas.id_mascota = mascotas.id_mascota
        ORDER BY fecha_cita DESC
    ");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
    exit;
}

if ($_POST["Tipo"] == "ModificarCita") {
    $datos = $_POST;
    $resultado = CitasController::ctrModificarCita($datos);
    echo json_encode(["status" => $resultado === "ok" ? "ok" : "error"]);
    exit;
}

echo json_encode(["error" => "Tipo de solicitud inválido"]);
exit;