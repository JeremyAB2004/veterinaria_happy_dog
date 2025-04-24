<?php
$db = new mysqli("localhost", "root", "12345678", "veterinaria_happy_dog");

if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}
