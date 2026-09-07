<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $objeto_celeste = $_POST['objeto_celeste'] ?? '';
    $fecha_observacion = $_POST['fecha_observacion'] ?? '';

    // Crear la carpeta uploads automáticamente si no existe
    $directorio_uploads = 'uploads/';
    if (!is_dir($directorio_uploads)) {
        mkdir($directorio_uploads, 0755, true);
    }

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = time() . '_' . basename($_FILES['imagen']['name']);
        $ruta_destino = $directorio_uploads . $nombre_archivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
            // Guardar los datos en la base de datos
            $stmt = $conexion->prepare("INSERT INTO capturas (titulo, objeto_celeste, fecha_observacion, imagen_path) VALUES (?, ?, ?, ?)");
            $stmt->execute([$titulo, $objeto_celeste, $fecha_observacion, $ruta_destino]);

            header("Location: galeria.php");
            exit();
        } else {
            echo "Error al guardar el archivo en la carpeta uploads.";
        }
    } else {
        echo "Error en la subida de la imagen.";
    }
}
?>