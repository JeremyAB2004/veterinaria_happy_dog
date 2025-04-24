<?php
require_once "connection.php";

class CitasModel {
    
    // Agendar nueva cita
    static public function mdlAgendarCita($tabla, $datos) {
        $stmt = Connection::connect()->prepare("INSERT INTO $tabla (id_cliente, id_mascota, fecha_cita, motivo, estado, notas) 
                                                VALUES (:id_cliente, :id_mascota, :fecha_cita, :motivo, :estado, :notas)");

        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_mascota", $datos["id_mascota"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_cita", $datos["fecha_cita"], PDO::PARAM_STR);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":notas", $datos["notas"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }

    // Consultar citas por cliente o mascota
    static public function mdlConsultarCitas($tabla, $filtro, $valor) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $filtro = :valor ORDER BY fecha_cita DESC");
        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Modificar cita existente
    static public function mdlModificarCita($tabla, $datos) {
        $stmt = Connection::connect()->prepare("UPDATE $tabla SET fecha_cita = :fecha_cita, motivo = :motivo, estado = :estado, notas = :notas
                                                WHERE id_cita = :id_cita");

        $stmt->bindParam(":fecha_cita", $datos["fecha_cita"], PDO::PARAM_STR);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":notas", $datos["notas"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cita", $datos["id_cita"], PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }
}