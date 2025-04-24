<?php

class MascotasController {

    static public function ctrInsertarMascota($nombre, $edad, $especie, $raza, $id_usuario) {
        $table = "mascotas";
        $response = MascotasModel::mdlInsertarMascota($table, $nombre, $edad, $especie, $raza, $id_usuario);
        return $response;
    }

    static public function ctrObtenerMascotas($id_usuario) {
        $table = "mascotas";
        $response = MascotasModel::mdlObtenerMascotasPorCliente($table, $id_usuario);
        return $response;
    }

    static public function ctrActualizarMascota($id_mascota, $nombre, $edad, $especie, $raza) {
        $table = "mascotas";
        $response = MascotasModel::mdlActualizarMascota($table, $id_mascota, $nombre, $edad, $especie, $raza);
        return $response;
    }

    static public function ctrObtenerMascotaPorId($id_mascota) {
        $table = "mascotas";
        $response = MascotasModel::mdlObtenerMascotaPorId($table, $id_mascota);
        return $response;
    }

    static public function ctrObtenerMascotasConsulta($id_usuario) {
        $table = "mascotas";
        $response = MascotasModel::mdlObtenerMascotasPorCliente($table, $id_usuario);
        return [
            "status" => empty($response) ? "empty" : "success",
            "data" => $response
        ];
    }
    
    static public function ctrObtenerMascotaPorIdConsulta($id_mascota) {
        $table = "mascotas";
        $response = MascotasModel::mdlObtenerMascotaPorId($table, $id_mascota);
        
        if ($response) {
            return [
                "status" => "success",
                "data" => $response
            ];
        } else {
            return [
                "status" => "error",
                "message" => "Mascota no encontrada"
            ];
        }
    }

}
