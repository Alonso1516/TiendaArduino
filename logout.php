<?php
session_start();
session_destroy(); // Eliminar la sesión actual
header("Location: login.html"); // Redirigir al login
exit();
?>
