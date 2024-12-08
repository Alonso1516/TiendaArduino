<?php
header("Content-Type: application/json");

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "arduino_shop");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Error de conexión: " . $conn->connect_error]);
    exit();
}

// Leer datos JSON
$data = json_decode(file_get_contents("php://input"), true);
$productos = $data['productos'] ?? null;
$total = $data['total'] ?? 0;

if ($productos && $total > 0) {
    $sql = "INSERT INTO pedidos (productos, total) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $productos, $total);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Compra guardada exitosamente."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al guardar la compra: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Datos inválidos."]);
}

$conn->close();
?>
