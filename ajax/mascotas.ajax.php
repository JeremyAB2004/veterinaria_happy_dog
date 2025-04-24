<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../controllers/mascotas.controller.php";
require_once "../models/mascotas.model.php";

class AjaxMascotas {

    public $datos;

    public function ajaxInsertarMascota() {
        try {
            $datos = json_decode($this->datos, true);
            
            // Validate required fields
            if (empty($datos['nombre']) || empty($datos['edad']) || empty($datos['especie']) || empty($datos['id_usuario'])) {
                throw new Exception("Todos los campos obligatorios deben ser completados");
            }

            $nombre = $datos['nombre'];
            $edad = $datos['edad'];
            $especie = $datos['especie'];
            $raza = $datos['raza'] ?? ''; // Make raza optional
            $id_usuario = $datos['id_usuario'];

            $response = MascotasController::ctrInsertarMascota($nombre, $edad, $especie, $raza, $id_usuario);

            if ($response === "ok") {
                echo json_encode([
                    "status" => "success",
                    "message" => "Mascota registrada correctamente"
                ]);
            } else {
                throw new Exception($response ?: "Error desconocido al registrar mascota");
            }
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function ajaxObtenerMascotas() {
        try {
            $datos = json_decode($this->datos, true);
            
            if (empty($datos['id_usuario'])) {
                throw new Exception("ID de usuario no proporcionado");
            }
            
            $id_usuario = $datos['id_usuario'];
            $response = MascotasController::ctrObtenerMascotas($id_usuario);

            echo json_encode([
                "status" => "success",
                "data" => $response
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function ajaxObtenerMascotasConsulta() {
        try {
            $datos = json_decode($this->datos, true);
            
            if (empty($datos['id_usuario'])) {
                throw new Exception("ID de usuario no proporcionado");
            }
            
            $id_usuario = $datos['id_usuario'];
            $response = MascotasController::ctrObtenerMascotasConsulta($id_usuario);
    
            // Asegúrate de que el controlador devuelva directamente los datos
            // sin envolverlos en otro array con status
            echo json_encode($response);
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function ajaxActualizarMascota() {
        try {
            $datos = json_decode($this->datos, true);
            
            // Validate required fields
            if (empty($datos['id_mascota']) || empty($datos['nombre']) || empty($datos['edad']) || empty($datos['especie'])) {
                throw new Exception("Todos los campos obligatorios deben ser completados");
            }
    
            $id_mascota = $datos['id_mascota'];
            $nombre = $datos['nombre'];
            $edad = $datos['edad'];
            $especie = $datos['especie'];
            $raza = $datos['raza'] ?? '';
    
            $response = MascotasController::ctrActualizarMascota($id_mascota, $nombre, $edad, $especie, $raza);
    
            if ($response === "ok") {
                echo json_encode([
                    "status" => "success",
                    "message" => "Mascota actualizada correctamente"
                ]);
            } else {
                throw new Exception($response ?: "Error desconocido al actualizar mascota");
            }
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
    
    public function ajaxObtenerMascota() {
        try {
            $datos = json_decode($this->datos, true);
            
            if (empty($datos['id_mascota'])) {
                throw new Exception("ID de mascota no proporcionado");
            }
            
            $id_mascota = $datos['id_mascota'];
            $response = MascotasController::ctrObtenerMascotaPorId($id_mascota);
    
            if ($response) {
                echo json_encode([
                    "status" => "success",
                    "data" => $response
                ]);
            } else {
                throw new Exception("Mascota no encontrada");
            }
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function ajaxObtenerMascotaConsulta() {
        try {
            $datos = json_decode($this->datos, true);
            
            if (empty($datos['id_mascota'])) {
                throw new Exception("ID de mascota no proporcionado");
            }
            
            $id_mascota = $datos['id_mascota'];
            $response = MascotasController::ctrObtenerMascotaPorIdConsulta($id_mascota);
    
            echo json_encode($response);
            
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
}



// Update the main if statement to handle new actions
if (isset($_POST["datos"])) {
    $accion = $_POST["accion"] ?? '';

    $ajax = new AjaxMascotas();
    $ajax->datos = $_POST["datos"];

    try {
        if ($accion == "insertar") {
            $ajax->ajaxInsertarMascota();
        } else if ($accion == "obtener") {
            $ajax->ajaxObtenerMascotas();
        } else if ($accion == "obtener_una") {
            $ajax->ajaxObtenerMascota();
        } else if ($accion == "obtener_consulta") {
            $ajax->ajaxObtenerMascotasConsulta();
        } else if ($accion == "obtener_una_consulta") {
            $ajax->ajaxObtenerMascotaConsulta();
        } else if ($accion == "actualizar") {
            $ajax->ajaxActualizarMascota();
        } else {
            throw new Exception("Acción no válida");
        }
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
}