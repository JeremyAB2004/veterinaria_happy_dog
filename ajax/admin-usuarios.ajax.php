<?php

require_once "../controllers/admin-usuarios.controller.php";
require_once "../models/admin-usuarios.model.php";

class AjaxAdminUsuarios {

    /*=============================================
    =            CARGAR USUARIOS            =
    =============================================*/
    
    public function ajaxCargarUsuarios() {
        $response = AdminUsuariosController::ctrCargarUsuarios();
        echo json_encode($response);
    }
    
    /*=============================================
    =            CARGAR ROLES            =
    =============================================*/
    
    public function ajaxCargarRoles() {
        $response = AdminUsuariosController::ctrCargarRoles();
        echo json_encode($response);
    }
    
    /*=============================================
    =            CARGAR USUARIO            =
    =============================================*/
    
    public $idUsuario;
    
    public function ajaxCargarUsuario() {
        $response = AdminUsuariosController::ctrCargarUsuario($this->idUsuario);
        echo json_encode($response);
    }
    
    /*=============================================
    =            ACTUALIZAR USUARIO            =
    =============================================*/
    
    public $idUsuarioActualizar;
    public $idRol;
    
    public function ajaxActualizarUsuario() {
        $response = AdminUsuariosController::ctrActualizarUsuario($this->idUsuarioActualizar, $this->idRol);
        echo json_encode($response);
    }
}

/*=============================================
=            EJECUTAR AJAX            =
=============================================*/

if(isset($_POST['action'])) {
    $ajax = new AjaxAdminUsuarios();
    
    switch($_POST['action']) {
        case 'cargarUsuarios':
            $ajax->ajaxCargarUsuarios();
            break;
        case 'cargarRoles':
            $ajax->ajaxCargarRoles();
            break;
        case 'cargarUsuario':
            $ajax->idUsuario = $_POST['idUsuario'];
            $ajax->ajaxCargarUsuario();
            break;
        case 'actualizarUsuario':
            $ajax->idUsuarioActualizar = $_POST['idUsuario'];
            $ajax->idRol = $_POST['idRol'];
            $ajax->ajaxActualizarUsuario();
            break;
    }
}