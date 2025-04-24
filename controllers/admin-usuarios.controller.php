<?php

require_once "../models/admin-usuarios.model.php";

class AdminUsuariosController {

    /*=============================================
    =            CARGAR USUARIOS            =
    =============================================*/
    
    static public function ctrCargarUsuarios() {
        $response = AdminUsuariosModel::mdlCargarUsuarios();
        return $response;
    }
    
    /*=============================================
    =            CARGAR ROLES            =
    =============================================*/
    
    static public function ctrCargarRoles() {
        $response = AdminUsuariosModel::mdlCargarRoles();
        return $response;
    }
    
    /*=============================================
    =            CARGAR USUARIO            =
    =============================================*/
    
    static public function ctrCargarUsuario($idUsuario) {
        $response = AdminUsuariosModel::mdlCargarUsuario($idUsuario);
        return $response;
    }
    
    /*=============================================
    =            ACTUALIZAR USUARIO            =
    =============================================*/
    
    static public function ctrActualizarUsuario($idUsuario, $idRol) {
        $response = AdminUsuariosModel::mdlActualizarUsuario($idUsuario, $idRol);
        return $response;
    }
}