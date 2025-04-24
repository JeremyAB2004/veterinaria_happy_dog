<?php
require_once "connection.php";

class RegistroModel {

    static public function mdlInsertarUsuarios($table, $nombre, $primer_apellido, $segundo_apellido, $correo, $claveHash, $telefono, $id_rol) {
        $stmt = Connection::connect()->prepare("INSERT INTO $table 
            (nombre, primer_apellido, segundo_apellido, correo, clave, telefono, id_rol) 
            VALUES (:nombre, :primer_apellido, :segundo_apellido, :correo, :clave, :telefono, :id_rol)");
        
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":primer_apellido", $primer_apellido, PDO::PARAM_STR);
        $stmt->bindParam(":segundo_apellido", $segundo_apellido, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $claveHash, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        
        $stmt = null;
    }
    
    static public function mdlCargarUsuarios($table, $correo) {

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE correo = '$correo'");


        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = null;

    }

}