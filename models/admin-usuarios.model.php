<?php

require_once "connection.php";

class AdminUsuariosModel {

    /*=============================================
    =            CARGAR USUARIOS            =
    =============================================*/
    
    static public function mdlCargarUsuarios() {
        $stmt = Connection::connect()->prepare("
            SELECT u.*, r.nombre as nombre_rol 
            FROM usuarios u
            JOIN roles r ON u.id_rol = r.id_rol
            ORDER BY u.id_usuario DESC
        ");
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /*=============================================
    =            CARGAR ROLES            =
    =============================================*/
    
    static public function mdlCargarRoles() {
        $stmt = Connection::connect()->prepare("SELECT * FROM roles ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /*=============================================
    =            CARGAR USUARIO            =
    =============================================*/
    
    static public function mdlCargarUsuario($idUsuario) {
        $stmt = Connection::connect()->prepare("
            SELECT u.*, r.nombre as nombre_rol 
            FROM usuarios u
            JOIN roles r ON u.id_rol = r.id_rol
            WHERE u.id_usuario = :idUsuario
        ");
        
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /*=============================================
    =            ACTUALIZAR USUARIO            =
    =============================================*/
    
    static public function mdlActualizarUsuario($idUsuario, $idRol) {
        $stmt = Connection::connect()->prepare("
            UPDATE usuarios 
            SET id_rol = :idRol 
            WHERE id_usuario = :idUsuario
        ");
        
        $stmt->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        
        if($stmt->execute()) {
            return array("status" => "success", "message" => "Usuario actualizado correctamente");
        } else {
            return array("status" => "error", "message" => "Error al actualizar el usuario");
        }
    }
}