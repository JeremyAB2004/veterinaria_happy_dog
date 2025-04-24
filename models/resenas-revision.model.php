<?php

require_once "connection.php";

class ResenasRevisionModel {

    /*=============================================
    =            CARGAR RESEÑAS PARA REVISIÓN     =
    =============================================*/
    
    static public function mdlCargarResenasRevision($pagina = 1, $filtro = 'todas') {
        try {
            $db = Connection::connect();
            
            // Configuración de paginación
            $elementosPorPagina = 10;
            $inicio = ($pagina - 1) * $elementosPorPagina;
            
            // Construir la consulta según el filtro
            $whereClause = "";
            if ($filtro !== 'todas') {
                $whereClause = "WHERE estado = :filtro";
            }
            
            // Consulta para contar total de registros
            $sqlCount = "SELECT COUNT(*) as total FROM reseñas $whereClause";
            $stmtCount = $db->prepare($sqlCount);
            
            if ($filtro !== 'todas') {
                $stmtCount->bindParam(":filtro", $filtro, PDO::PARAM_STR);
            }
            
            $stmtCount->execute();
            $totalRegistros = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
            $totalPaginas = ceil($totalRegistros / $elementosPorPagina);
            
            // Consulta para obtener los registros de la página actual
            $sql = "SELECT * FROM reseñas $whereClause ORDER BY fecha_publicacion DESC LIMIT :inicio, :elementos";
            $stmt = $db->prepare($sql);
            
            if ($filtro !== 'todas') {
                $stmt->bindParam(":filtro", $filtro, PDO::PARAM_STR);
            }
            
            $stmt->bindParam(":inicio", $inicio, PDO::PARAM_INT);
            $stmt->bindParam(":elementos", $elementosPorPagina, PDO::PARAM_INT);
            
            $stmt->execute();
            $resenas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return [
                'resenas' => $resenas,
                'totalPaginas' => $totalPaginas
            ];
        } catch (PDOException $e) {
            error_log("Error en mdlCargarResenasRevision: " . $e->getMessage());
            return false;
        }
    }
    
    /*=============================================
    =            CARGAR DETALLE DE RESEÑA        =
    =============================================*/
    
    static public function mdlCargarDetalleResena($idResena) {
        try {
            $stmt = Connection::connect()->prepare("
                SELECT * FROM reseñas 
                WHERE id_reseña = :id_resena
                LIMIT 1
            ");
            
            $stmt->bindParam(":id_resena", $idResena, PDO::PARAM_INT);
            $stmt->execute();
            
            $resena = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$resena) {
                return false;
            }
            
            return $resena;
        } catch (PDOException $e) {
            error_log("Error en mdlCargarDetalleResena: " . $e->getMessage());
            return false;
        }
    }
    
    /*=============================================
    =            CAMBIAR ESTADO DE RESEÑA        =
    =============================================*/
    
    static public function mdlCambiarEstadoResena($idResena, $estado) {
        try {
            $stmt = Connection::connect()->prepare("
                UPDATE reseñas 
                SET estado = :estado
                WHERE id_reseña = :id_resena
            ");
            
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":id_resena", $idResena, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en mdlCambiarEstadoResena: " . $e->getMessage());
            return false;
        }
    }
}