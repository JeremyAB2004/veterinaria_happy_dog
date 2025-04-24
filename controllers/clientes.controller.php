<?php


class ClientesController {

    /*================================
    =         READ CLIENTES       =
    =================================*/
    static public function ctrObtenerClientes() {

        $table = "clientes";	

		$response = ClientesModel::mdlObtenerClientes($table);		

		return $response;
        
    }
    static public function ctrBuscarCliente($id) {
        $table = "clientes";
        return ClientesModel::mdlBuscarCliente($table, $id);
    }
    
    static public function ctrAgregarCliente($datos) {
        $table = "clientes";
        return ClientesModel::mdlInsertarCliente($table, $datos);
    }

    static public function ctrActualizarCliente($datos) {
        $table = "clientes";
        return ClientesModel::mdlActualizarCliente($table, $datos);
    }

    
}

?>