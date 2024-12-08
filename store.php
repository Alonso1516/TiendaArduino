<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Shop</title>
    <link rel="stylesheet" href="store.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="user-info">
            <span class="username"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Invitado'); ?></span>
            <button class="logout" onclick="window.location.href='logout.php'">Cerrar Sesión</button>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="editar_perfil.php">Editar Perfil</a></li>
                <li><a href="#quienes-somos">Quiénes Somos</a></li>
                <li><a href="#productos">Productos</a></li>
            </ul>
        </nav>
    </header>

    <!-- Quiénes Somos -->
    <section id="quienes-somos" class="quienes-somos">
        <h2>Quiénes Somos</h2>
        <p>
            Bienvenido a **Arduino Shop**, tu tienda en línea especializada en productos de Arduino. 
            Nos dedicamos a ofrecerte los mejores kits, placas, y accesorios para tus proyectos electrónicos. 
            Ya seas un estudiante, un aficionado o un profesional, aquí encontrarás todo lo que necesitas para desarrollar 
            tus ideas y llevarlas al siguiente nivel.
        </p>
        <p>
            Nuestro objetivo es fomentar la creatividad y la innovación proporcionando herramientas de alta calidad 
            y soporte a nuestra comunidad de usuarios. Gracias por confiar en nosotros.
        </p>
    </section>

    <!-- Productos -->
    <section id="productos" class="productos">
        <h2>Productos Destacados</h2>
        <div class="producto-grid">
            <div class="producto">
                <img src="imagenes/Arduino%20Engineering.png" alt="Arduino Engineering Kit">
                <h3>Arduino Engineering Kit</h3>
                <p>$199.99</p>
                <button onclick="agregarAlCarrito('Arduino Engineering Kit', 199.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20Mega%202560.png" alt="Arduino Mega 2560">
                <h3>Arduino Mega 2560</h3>
                <p>$39.99</p>
                <button onclick="agregarAlCarrito('Arduino Mega 2560', 39.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20MKR%20FOX%201200.png" alt="Arduino MKR FOX 1200">
                <h3>Arduino MKR FOX 1200</h3>
                <p>$29.99</p>
                <button onclick="agregarAlCarrito('Arduino MKR FOX 1200', 29.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20MKR%20GSM%201400.png" alt="Arduino MKR GSM 1400">
                <h3>Arduino MKR GSM 1400</h3>
                <p>$59.99</p>
                <button onclick="agregarAlCarrito('Arduino MKR GSM 1400', 59.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20MKR%20Wifi%201010.png" alt="Arduino MKR Wifi 1010">
                <h3>Arduino MKR Wifi 1010</h3>
                <p>$34.99</p>
                <button onclick="agregarAlCarrito('Arduino MKR Wifi 1010', 34.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20Nano%2033%20Ble.png" alt="Arduino Nano 33 BLE">
                <h3>Arduino Nano 33 BLE</h3>
                <p>$19.99</p>
                <button onclick="agregarAlCarrito('Arduino Nano 33 BLE', 19.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20Nano%20Every.png" alt="Arduino Nano Every">
                <h3>Arduino Nano Every</h3>
                <p>$12.99</p>
                <button onclick="agregarAlCarrito('Arduino Nano Every', 12.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/Arduino%20Nano%20Original.png" alt="Arduino Nano Original">
                <h3>Arduino Nano Original</h3>
                <p>$24.99</p>
                <button onclick="agregarAlCarrito('Arduino Nano Original', 24.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/arduino.png" alt="Arduino Uno">
                <h3>Arduino Uno</h3>
                <p>$22.99</p>
                <button onclick="agregarAlCarrito('Arduino Uno', 22.99)">Añadir al carrito</button>
            </div>
            <div class="producto">
                <img src="imagenes/arduino_due.png" alt="Arduino Due">
                <h3>Arduino Due</h3>
                <p>$54.99</p>
                <button onclick="agregarAlCarrito('Arduino Due', 54.99)">Añadir al carrito</button>
            </div>
        </div>
    </section>

    <!-- Carrito -->
    <section id="carrito" class="carrito">
        <h2>Carrito de Compras</h2>
        <div id="carrito-contenido"></div>
        <h3>Total: $<span id="total">0.00</span></h3>
        <button onclick="finalizarCompra()">Finalizar Compra</button>
    </section>
</body>
<script src="store.js"></script>
</html>
