<?php
$host = getenv('MYSQL_ADDON_HOST');
$port = getenv('MYSQL_ADDON_PORT') ?: '3306';
$db = getenv('MYSQL_ADDON_DB');
$user = getenv('MYSQL_ADDON_USER');
$pass = getenv('MYSQL_ADDON_PASSWORD');

// Si el host está vacío, significa que Clever Cloud no ha enlazado la base de datos con la app
if (!$host) {
    die("Error crítico: Las variables de entorno de MySQL no están vinculadas a la aplicación en Clever Cloud.");
}

try {
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5 // Falla en 5 segundos si no hay respuesta en lugar de colgarse
    ]);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>