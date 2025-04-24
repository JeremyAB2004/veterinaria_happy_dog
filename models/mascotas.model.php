<?php
require_once "connection.php";

class MascotasModel {

    static public function mdlInsertarMascota($table, $nombre, $edad, $especie, $raza, $id_usuario) {
        $stmt = Connection::connect()->prepare("INSERT INTO $table 
            (nombre, edad, raza, especie, id_usuario) 
            VALUES (:nombre, :edad, :raza, :especie, :id_usuario)");

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":edad", $edad, PDO::PARAM_INT);
        $stmt->bindParam(":especie", $especie, PDO::PARAM_STR);
        $stmt->bindParam(":raza", $raza, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    static public function mdlObtenerMascotasPorCliente($table, $id_usuario) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
    }

    static public function mdlActualizarMascota($table, $id_mascota, $nombre, $edad, $especie, $raza) {
        $stmt = Connection::connect()->prepare("UPDATE $table SET 
            nombre = :nombre, 
            edad = :edad, 
            especie = :especie, 
            raza = :raza 
            WHERE id_mascota = :id_mascota");

        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":edad", $edad, PDO::PARAM_INT);
        $stmt->bindParam(":especie", $especie, PDO::PARAM_STR);
        $stmt->bindParam(":raza", $raza, PDO::PARAM_STR);
        $stmt->bindParam(":id_mascota", $id_mascota, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    static public function mdlObtenerMascotaPorId($table, $id_mascota) {
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id_mascota = :id_mascota");
        $stmt->bindParam(":id_mascota", $id_mascota, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
    }
}
