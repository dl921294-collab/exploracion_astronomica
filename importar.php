<?php
$host = getenv('MYSQL_ADDON_HOST');
$port = getenv('MYSQL_ADDON_PORT');
$db   = getenv('MYSQL_ADDON_DB');
$user = getenv('MYSQL_ADDON_USER');
$pass = getenv('MYSQL_ADDON_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Reemplaza 'respaldo.sql' por el nombre exacto de tu archivo SQL guardado en la carpeta
    $sql = file_get_contents('respaldo.sql'); 
    $pdo->exec($sql);

    echo "¡Tablas y registros creados exitosamente en Clever Cloud!";
} catch (PDOException $e) {
    echo "Error al importar: " . $e->getMessage();
}
?>