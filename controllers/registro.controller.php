<?php

class RegistroController {

    /*================================
    =         READ USUARIOS        =
    =================================*/
    static public function ctrCargarUsuarios($correo) {

        $table = "usuarios";	

		$response = RegistroModel::mdlCargarUsuarios($table, $correo);		

		return $response;
        
    }

    /*================================
    =         READ PUESTOS        =
    =================================*/

    static public function mdlInsertarUsuarios($nombre, $primer_apellido, $segundo_apellido, $correo, $claveHash, $telefono, $id_rol) {

        $table = "usuarios";	

		$response = RegistroModel::mdlInsertarUsuarios($table, $nombre, $primer_apellido, $segundo_apellido, $correo, $claveHash, $telefono, $id_rol);		

		return $response;
        
    }
}

?>