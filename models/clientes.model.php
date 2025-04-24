<?php
require_once "connection.php";

class ClientesModel {

    
    
    // Método para obtener los clientes
    static public function mdlObtenerClientes($tabla) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = null;
    }

    // Método para insertar nuevo aplicante
    static public function mdlInsertarCliente($tabla, $datos) {
        $stmt = Connection::connect()->prepare("INSERT INTO $tabla (nombre, correo, telefono, direccion) 
                                                VALUES (:nombre, :correo, :telefono, :direccion)");
    
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
    
        return $stmt->execute() ? "ok" : "error";
    }

    static public function mdlActualizarCliente($tabla, $datos) {
        $stmt = Connection::connect()->prepare("UPDATE $tabla 
                                                SET nombre = :nombre, correo = :correo, telefono = :telefono, direccion = :direccion 
                                                WHERE id_cliente = :id_cliente");
    
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT); // Solo para el WHERE
    
        return $stmt->execute() ? "ok" : "error";
    }

    
    static public function mdlBuscarCliente($tabla, $id) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE id_cliente = :id");
    
        // Solución: Crear una variable temporal
        $idCliente = intval($id);
        $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
        
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $response ?: ["error" => "Cliente no encontrado"];
    }
    
}