<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

$resultado = $conn->query("SELECT * FROM capturas ORDER BY fecha_observacion DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bitácora de Astrofotografía</title>
  <style>
       nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      background-color: #15192b;
      padding: 15px;
    }
    nav a {
      color: #70a1ff;
      text-decoration: none;
      font-weight: bold;
    }
    body { background-color: #0b0d17; color: #e0e6ed; font-family: sans-serif; padding: 20px; text-align: center; }
    h1 { color: #4880ff; }
    .btn { display: inline-block; background-color: #70a1ff; color: #0b0d17; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-bottom: 30px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; text-align: left; max-width: 1000px; margin: 0 auto; }
    .card { background: #15192b; border-radius: 8px; overflow: hidden; border: 1px solid #2a3150; }
    .card img { width: 100%; height: 200px; object-fit: cover; }
    .card-body { padding: 15px; }
    .card-title { margin: 0 0 10px 0; color: #70a1ff; }
    .tech-specs { font-size: 0.85em; background: #0b0d17; padding: 8px; border-radius: 4px; margin-top: 10px; }
    .empty-msg { background: #15192b; padding: 30px; border-radius: 8px; border: 1px solid #2a3150; max-width: 500px; margin: 0 auto; }
  </style>
</head>
 <nav>
  <a href="index.php">Inicio</a>
   <a href="galeria.php">Galería</a>
  <a href="guias.php">Guías</a>
  <a href="subir_foto.php">+ Registrar Foto</a>
</nav>
<body>
  <h1>Bitácora de Observación Astrofotográfica</h1>
  <a href="subir_foto.php" class="btn">+ Registrar nueva foto</a>

  <?php if ($resultado && $resultado->num_rows > 0): ?>
    <div class="grid">
      <?php while($row = $resultado->fetch_assoc()): ?>
        <div class="card">
          <img src="<?php echo htmlspecialchars($row['imagen_path']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
          <div class="card-body">
            <h3 class="card-title"><?php echo htmlspecialchars($row['titulo']); ?></h3>
            <p><strong>Objeto:</strong> <?php echo htmlspecialchars($row['objeto_celeste']); ?></p>
            <p><strong>Fecha:</strong> <?php echo htmlspecialchars($row['fecha_observacion']); ?></p>
            
            <div class="tech-specs">
              <p>🔭 <strong>Telescopio:</strong> <?php echo htmlspecialchars($row['telescopio']); ?></p>
              <p>📷 <strong>Cámara:</strong> <?php echo htmlspecialchars($row['camara']); ?></p>
              <p>⏱️ <strong>Exposición:</strong> <?php echo htmlspecialchars($row['tiempo_exposicion']); ?></p>
            </div>
            
            <?php if(!empty($row['notas'])): ?>
              <p><small><?php echo htmlspecialchars($row['notas']); ?></small></p>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="empty-msg">
      <p>No hay fotos guardadas en la base de datos todavía.</p>
      <p>Haz clic en el botón de arriba para registrar tu primera captura.</p>
    </div>
  <?php endif; ?>
</body>
</html>