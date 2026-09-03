<?php

$directorio_destino = __DIR__ . '/uploads/';


if (!file_exists($directorio_destino)) {
    mkdir($directorio_destino, 0777, true);
}

$nombre_foto = time() . "_" . basename($_FILES["imagen"]["name"]);
$ruta_servidor = $directorio_destino . $nombre_foto; 
$ruta_bd = "uploads/" . $nombre_foto;                

if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_servidor)) {
   
 
}
?>