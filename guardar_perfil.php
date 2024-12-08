<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "Por favor, inicia sesión nuevamente.";
    exit();
}

require_once('conexion.php');

$user_id = $_SESSION['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$new_password = $_POST['password'];

// Verificar si el correo ya existe en la base de datos (excepto para el usuario actual)
$sql_check_email = "SELECT id FROM users WHERE email = ? AND id != ?";
$stmt_check_email = $conn->prepare($sql_check_email);
$stmt_check_email->bind_param("si", $email, $user_id);
$stmt_check_email->execute();
$stmt_check_email->store_result();

if ($stmt_check_email->num_rows > 0) {
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h2 style='color: red;'>Error: El correo electrónico ya está en uso.</h2>
        <p style='font-size: 18px;'>Por favor, utiliza otro correo.</p>
        <a href='editar_perfil.php' style='padding: 10px 20px; background-color: #00979D; color: white; text-decoration: none; border-radius: 5px;'>Regresar</a>
    </div>
    ";
    exit();
}

// Actualizar los datos del usuario
if (!empty($new_password)) {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql_update = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssi", $username, $email, $hashed_password, $user_id);
} else {
    $sql_update = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssi", $username, $email, $user_id);
}

if ($stmt_update->execute()) {
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h2 style='color: #00979D;'>Perfil actualizado correctamente.</h2>
        <a href='store.php' style='padding: 10px 20px; background-color: #00979D; color: white; text-decoration: none; border-radius: 5px;'>Volver a la tienda</a>
    </div>
    ";
} else {
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h2 style='color: red;'>Error al actualizar el perfil.</h2>
        <a href='editar_perfil.php' style='padding: 10px 20px; background-color: #00979D; color: white; text-decoration: none; border-radius: 5px;'>Regresar</a>
    </div>
    ";
}
?>
