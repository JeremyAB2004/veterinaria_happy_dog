<?php
session_start();
require_once '../models/conexion.php'; // Ajustá la ruta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['email'];
    $clavePlano = $_POST['password'];

    try {
        // Buscar usuario
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            echo json_encode(["ok" => false, "mensaje" => "Usuario no encontrado"]);
            exit;
        }

        // Verificar contraseña
        if (hash_equals($usuario['clave'], crypt($clavePlano, $usuario['clave']))) {
            // Guardar sesión
            $_SESSION['usuario'] = [
                'id' => $usuario['id_usuario'],
                'correo' => $usuario['correo'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['id_rol']
            ];            

            echo json_encode(["ok" => true, "nombre" => $usuario['nombre']]);
        } else {
            echo json_encode(["ok" => false, "mensaje" => "Contraseña incorrecta"]);
        }

    } catch (PDOException $e) {
        echo json_encode(["ok" => false, "mensaje" => "Error: " . $e->getMessage()]);
    }
}
?>
