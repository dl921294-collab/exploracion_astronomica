<?php
$host = getenv('MYSQL_ADDON_HOST');
$port = getenv('MYSQL_ADDON_PORT');
$db   = getenv('MYSQL_ADDON_DB');
$user = getenv('MYSQL_ADDON_USER');
$pass = getenv('MYSQL_ADDON_PASSWORD');

try {
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>