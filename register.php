<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "arduino_shop");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "
        <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
            <h2 style='color: #00979D;'>¡Registro Exitoso!</h2>
            <p>Tu cuenta ha sido creada exitosamente.</p>
            <a href='login.html'>Inicia Sesión Aquí</a>
        </div>
        ";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
