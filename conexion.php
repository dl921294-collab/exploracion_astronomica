<?php
$host = 'buf2i22d9jjzquzocz1h-mysql.services.clever-cloud.com';
$dbname = 'buf2i22d9jjzquzocz1h';
$username = 'urtyehr0owaf49a6';
$password = '9espOFbJ2LZTy0EMXpsN'; // Mantén tu contraseña real aquí

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5 // Si no conecta en 5 segundos, muestra error rápido en vez de congelarse
    ]);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>