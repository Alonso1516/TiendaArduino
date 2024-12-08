<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    echo "<h2>Editar Perfil</h2>";
    echo "<p>No se encontró el usuario. Por favor, inicia sesión nuevamente.</p>";
    exit();
}

// Incluir conexión a la base de datos
require_once('conexion.php');

// Obtener información del usuario actual
$user_id = $_SESSION['id'];
$sql = "SELECT username, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<h2>Editar Perfil</h2>";
    echo "<p>No se encontró el usuario. Por favor, inicia sesión nuevamente.</p>";
    exit();
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="container">
        <h2>Editar Perfil</h2>
        <form action="guardar_perfil.php" method="POST" enctype="multipart/form-data">
            <label for="username">Nombre de Usuario</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="password">Nueva Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Deja en blanco para no cambiar">

            <button type="submit">Guardar Cambios</button>
        </form>
        <br>
        <a href="store.php" class="btn">Volver a la Tienda</a>
    </div>
</body>
</html>
