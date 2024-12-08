<?php
$host = 'localhost';
$db = 'arduino_shop'; // Nombre de tu base de datos
$user = 'root';
$password = '';

// Crear conexión
$conn = new mysqli($host, $user, $password, $db);

// Verificar conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
?>
