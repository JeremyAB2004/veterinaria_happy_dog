<?php
$host = 'localhost';
$dbname = 'veterinaria_happy_dog';      // 🔁 Cambiá por el nombre real de tu BD
$usuario = 'root';     // 🔁 Usuario MySQL
$contrasena = '12345678'; // 🔁 Contraseña MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
