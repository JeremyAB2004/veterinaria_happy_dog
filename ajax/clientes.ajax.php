<?php
header('Content-Type: application/json; charset=UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../controllers/clientes.controller.php";
require_once "../models/clientes.model.php";

class ClientesAjax {

    public $id_cliente;

    public function AjaxObtenerClientes(){
        $response = ClientesController::ctrObtenerClientes();

        if (!is_array($response)) {
            echo json_encode(["error" => "La respuesta no es un array válido"]);
        } else {
            echo json_encode($response);
        }
    }

    public function AjaxBuscarCliente() {
        $id = $this->id_cliente;
        $response = ClientesController::ctrBuscarCliente($id);
        if (!$response || !is_array($response)) {
            echo json_encode(["error" => "Cliente no encontrado"]);
        } else {
            echo json_encode($response);
            exit;
        }
            
        
    }
}

if (isset($_POST["Tipo"])) {
    $tipo = $_POST["Tipo"];
    $clientes = new ClientesAjax();

    if ($tipo == "ObtenerClientes") {
        $clientes->AjaxObtenerClientes();
        exit;
    } elseif ($tipo == "BuscarCliente") {
        if (!isset($_POST["id_cliente"]) || empty($_POST["id_cliente"])) {
            echo json_encode(["error" => "ID de cliente no proporcionado"]);
        } else {
            $clientes->id_cliente = $_POST["id_cliente"];
            $clientes->AjaxBuscarCliente();
        }
        exit;
    } elseif ($tipo == "AgregarCliente") {
        $datos = $_POST;
        $resultado = ClientesController::ctrAgregarCliente($datos);
        echo json_encode(["status" => $resultado === "ok" ? "ok" : "error"]);
        exit;
    } elseif ($tipo == "ActualizarCliente") {
        $datos = $_POST;
        $resultado = ClientesController::ctrActualizarCliente($datos);
        echo json_encode(["status" => $resultado === "ok" ? "ok" : "error"]);
        exit;
    } else {
        echo json_encode(["error" => "Tipo de solicitud inválido"]);
        exit;
    }
}


if (isset($_POST["Tipo"]) && $_POST["Tipo"] == "ObtenerMascotas") {
    require_once "../models/clientes.model.php"; // Conexión a la BD

    $tabla = "mascotas";
    $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY nombre_mascota ASC");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
    exit;
}