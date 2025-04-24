<?php
require_once "connection.php";

class UsuarioModel {
    public static function existeCorreo($email) {
        $conn = Connection::connect();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public static function actualizarContrasena($email, $hash) {
        $conn = Connection::connect();
        $stmt = $conn->prepare("UPDATE usuarios SET clave = ? WHERE correo = ?");
        return $stmt->execute([$hash, $email]);
    }
}
