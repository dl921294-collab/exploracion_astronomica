<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $objeto = $_POST['objeto_celeste'];
    $fecha = $_POST['fecha_observacion'];
    $telescopio = $_POST['telescopio'];
    $camara = $_POST['camara'];
    $exposicion = $_POST['tiempo_exposicion'];
    $notas = $_POST['notas'];

    $directorio_destino = __DIR__ . '/uploads/';

    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }

    $nombre_foto = time() . '_' . basename($_FILES['imagen']['name']);
    $ruta_servidor = $directorio_destino . $nombre_foto;
    $ruta_bd = 'uploads/' . $nombre_foto;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_servidor)) {
        $sql = "INSERT INTO capturas (titulo, objeto_celeste, fecha_observacion, telescopio, camara, tiempo_exposicion, imagen_path, notas) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$titulo, $objeto, $fecha, $telescopio, $camara, $exposicion, $ruta_bd, $notas])) {
            echo "¡Captura registrada exitosamente! <a href='bitacora.php'>Ver bitácora</a>";
        } else {
            echo "Error al insertar en la base de datos.";
        }
    } else {
        echo "Error al guardar el archivo en la carpeta uploads.";
    }
}
?>