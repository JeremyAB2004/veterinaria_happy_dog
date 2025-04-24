<?php

require_once "connection.php";

class EstadisticasModel {

    static public function mdlCargarEstadisticas() {
        // Obtener total de usuarios
        $totalUsuarios = self::mdlContarUsuarios();
        
        // Obtener distribución por roles
        $distribucionRoles = self::mdlDistribucionRoles();
        
        // Obtener total de mascotas
        $totalMascotas = self::mdlContarMascotas();
        
        // Obtener edad promedio de mascotas
        $edadPromedio = self::mdlEdadPromedioMascotas();
        
        // Obtener distribución de edades de mascotas
        $distribucionEdades = self::mdlDistribucionEdadesMascotas();
        
        // Preparar respuesta
        $response = [
            'totalUsuarios' => $totalUsuarios,
            'totalAdmin' => self::mdlContarUsuariosPorRol(1),
            'totalVeterinarios' => self::mdlContarUsuariosPorRol(2),
            'totalClientes' => self::mdlContarUsuariosPorRol(3),
            'totalMascotas' => $totalMascotas,
            'edadPromedioMascotas' => $edadPromedio,
            'distribucionRoles' => $distribucionRoles,
            'distribucionEdades' => $distribucionEdades
        ];
        
        return $response;
    }
    
    static private function mdlContarUsuarios() {
        $stmt = Connection::connect()->prepare("SELECT COUNT(*) as total FROM usuarios");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
    static private function mdlContarUsuariosPorRol($idRol) {
        $stmt = Connection::connect()->prepare("SELECT COUNT(*) as total FROM usuarios WHERE id_rol = :idRol");
        $stmt->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
    static private function mdlDistribucionRoles() {
        $stmt = Connection::connect()->prepare("
            SELECT r.nombre as nombre_rol, COUNT(u.id_usuario) as total 
            FROM roles r
            LEFT JOIN usuarios u ON r.id_rol = u.id_rol
            GROUP BY r.id_rol
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    static private function mdlContarMascotas() {
        $stmt = Connection::connect()->prepare("SELECT COUNT(*) as total FROM mascotas");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
    static private function mdlEdadPromedioMascotas() {
        $stmt = Connection::connect()->prepare("SELECT AVG(edad) as promedio FROM mascotas");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['promedio'];
    }
    
    static private function mdlDistribucionEdadesMascotas() {
        $stmt = Connection::connect()->prepare("
            SELECT 
                CASE 
                    WHEN edad < 1 THEN 'Menos de 1 año'
                    WHEN edad BETWEEN 1 AND 3 THEN '1-3 años'
                    WHEN edad BETWEEN 4 AND 7 THEN '4-7 años'
                    WHEN edad BETWEEN 8 AND 10 THEN '8-10 años'
                    ELSE 'Más de 10 años'
                END as rango_edad,
                COUNT(*) as total
            FROM mascotas
            GROUP BY rango_edad
            ORDER BY 
                CASE 
                    WHEN rango_edad = 'Menos de 1 año' THEN 1
                    WHEN rango_edad = '1-3 años' THEN 2
                    WHEN rango_edad = '4-7 años' THEN 3
                    WHEN rango_edad = '8-10 años' THEN 4
                    ELSE 5
                END
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}