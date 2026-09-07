<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $objeto_celeste = $_POST['objeto_celeste'] ?? '';
    $fecha_observacion = $_POST['fecha_observacion'] ?? '';

    $directorio_uploads = 'uploads/';
    if (!is_dir($directorio_uploads)) {
        mkdir($directorio_uploads, 0755, true);
    }

    if (isset($_FILES['imagen'])) {
        $error_code = $_FILES['imagen']['error'];
        
        if ($error_code === UPLOAD_ERR_OK) {
            $nombre_archivo = time() . '_' . basename($_FILES['imagen']['name']);
            $ruta_destino = $directorio_uploads . $nombre_archivo;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
                $stmt = $conexion->prepare("INSERT INTO capturas (titulo, objeto_celeste, fecha_observacion, imagen_path) VALUES (?, ?, ?, ?)");
                $stmt->execute([$titulo, $objeto_celeste, $fecha_observacion, $ruta_destino]);

                header("Location: galeria.php");
                exit();
            } else {
                echo "Error: No se pudo mover el archivo a la carpeta uploads.";
            }
        } else {
            // Mostramos el código exacto de por qué falló PHP
            echo "Error de subida PHP (Código: $error_code). ";
            if ($error_code === 1 || $error_code === 2) {
                echo "El archivo es demasiado pesado para el límite configurado en el servidor.";
            } elseif ($error_code === 3) {
                echo "La subida se interrumpió (posible problema con tu internet móvil).";
            }
        }
    } else {
        echo "No se encontró el archivo de imagen en el formulario.";
    }
}
?>