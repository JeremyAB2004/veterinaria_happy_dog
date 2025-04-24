<?php

require_once "../models/resenas-revision.model.php";

class ResenasRevisionController {

    /*=============================================
    =            CARGAR RESEÑAS PARA REVISIÓN     =
    =============================================*/
    
    static public function ctrCargarResenasRevision($pagina = 1, $filtro = 'todas') {
        // Validar parámetros
        $pagina = (int) $pagina;
        if ($pagina < 1) $pagina = 1;
        
        // Validar filtro
        if (!in_array($filtro, ['todas', 'pendiente', 'aprobado', 'rechazado'])) {
            $filtro = 'todas';
        }
        
        $response = ResenasRevisionModel::mdlCargarResenasRevision($pagina, $filtro);
        
        if ($response === false) {
            return [
                'status' => 'error',
                'message' => 'Error al cargar las reseñas',
                'data' => [],
                'totalPaginas' => 0
            ];
        }
        
        return [
            'status' => 'success',
            'message' => 'Reseñas cargadas correctamente',
            'data' => $response['resenas'],
            'totalPaginas' => $response['totalPaginas']
        ];
    }
    
    /*=============================================
    =            CARGAR DETALLE DE RESEÑA        =
    =============================================*/
    
    static public function ctrCargarDetalleResena($idResena) {
        // Validar ID
        $idResena = (int) $idResena;
        if ($idResena <= 0) {
            return [
                'status' => 'error',
                'message' => 'ID de reseña inválido',
                'data' => null
            ];
        }
        
        $response = ResenasRevisionModel::mdlCargarDetalleResena($idResena);
        
        if ($response === false) {
            return [
                'status' => 'error',
                'message' => 'Error al cargar el detalle de la reseña',
                'data' => null
            ];
        }
        
        return [
            'status' => 'success',
            'message' => 'Detalle de reseña cargado correctamente',
            'data' => $response
        ];
    }
    
    /*=============================================
    =            CAMBIAR ESTADO DE RESEÑA        =
    =============================================*/
    
    static public function ctrCambiarEstadoResena($idResena, $estado) {
        // Validar ID
        $idResena = (int) $idResena;
        if ($idResena <= 0) {
            return [
                'status' => 'error',
                'message' => 'ID de reseña inválido'
            ];
        }
        
        // Validar estado
        if (!in_array($estado, ['pendiente', 'aprobado', 'rechazado'])) {
            return [
                'status' => 'error',
                'message' => 'Estado inválido'
            ];
        }
        
        $response = ResenasRevisionModel::mdlCambiarEstadoResena($idResena, $estado);
        
        if ($response === false) {
            return [
                'status' => 'error',
                'message' => 'Error al cambiar el estado de la reseña'
            ];
        }
        
        // Mensajes específicos según el estado
        $mensajeEstado = '';
        switch ($estado) {
            case 'aprobado':
                $mensajeEstado = 'La reseña ha sido aprobada y ahora es visible en el sitio.';
                break;
            case 'rechazado':
                $mensajeEstado = 'La reseña ha sido rechazada y no será visible en el sitio.';
                break;
            case 'pendiente':
                $mensajeEstado = 'La reseña ha sido marcada como pendiente de revisión.';
                break;
        }
        
        return [
            'status' => 'success',
            'message' => $mensajeEstado
        ];
    }
}