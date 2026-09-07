<<?php
include 'conexion.php';

$filtro = isset($_GET['cat']) ? $_GET['cat'] : 'todos';

if ($filtro !== 'todos') {
    $stmt = $conn->prepare("SELECT * FROM capturas WHERE objeto_celeste LIKE ? OR titulo LIKE ? ORDER BY fecha_observacion DESC");
    $param = "%" . $filtro . "%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $resultado = $conn->query("SELECT * FROM capturas ORDER BY fecha_observacion DESC");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Astronómica</title>
    <style>
        body { background-color: #0b0d17; color: #a0a6ed; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; }
        h1 { text-align: center; color: #4880ff; margin-bottom: 20px; }

        nav { display: flex; justify-content: center; gap: 20px; background: #15192b; padding: 15px; border-radius: 8px; margin-bottom: 25px; }
        nav a { color: #70a1ff; text-decoration: none; font-weight: bold; }

        .filters { display: flex; justify-content: center; gap: 10px; margin-bottom: 30px; flex-wrap: wrap; }
        .filter-btn { background: #181c30; color: #a0a6ed; padding: 8px 16px; border-radius: 20px; text-decoration: none; border: 1px solid #2a3150; transition: 0.3s; }
        .filter-btn.active, .filter-btn:hover { background: #4880ff; color: #fff; border-color: #4880ff; }

        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; max-width: 1100px; margin: 0 auto; }
        .gallery-item { position: relative; background: #15192b; border-radius: 10px; overflow: hidden; border: 1px solid #2a3150; box-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        .gallery-item img { width: 100%; height: 250px; object-fit: cover; display: block; transition: transform 0.3s ease; }
        .gallery-item:hover img { transform: scale(1.05); }

        .overlay { position: absolute; bottom: 0; background: linear-gradient(transparent, rgba(11, 13, 23, 0.95)); width: 100%; padding: 15px; box-sizing: border-box; }
        .overlay h3 { margin: 0 0 5px 0; color: #fff; font-size: 1.1em; }
        .overlay p { margin: 2px 0; font-size: 0.85em; color: #70a1ff; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="galeria.php">Galería</a>
        <a href="bitacora.php">Bitácora</a>
        <a href="subir_foto.php">+ Registrar Foto</a>
    </nav>

    <h1>Galería de Astrofotografía</h1>

    <div class="filters">
        <a href="galeria.php?cat=todos" class="filter-btn <?php echo ($filtro === 'todos') ? 'active' : ''; ?>">Todas</a>
        <a href="galeria.php?cat=Luna" class="filter-btn <?php echo ($filtro === 'Luna') ? 'active' : ''; ?>">🌙 Luna / Satélites</a>
        <a href="galeria.php?cat=Espacio Profundo" class="filter-btn <?php echo ($filtro === 'Espacio Profundo') ? 'active' : ''; ?>">🌌 Espacio Profundo</a>
        <a href="galeria.php?cat=Galaxia" class="filter-btn <?php echo ($filtro === 'Galaxia') ? 'active' : ''; ?>">🌀 Galaxia</a>
    </div>

    <div class="gallery-grid">
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <div class="gallery-item">
                    <img src="<?php echo htmlspecialchars($row['imagen_path']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                    <div class="overlay">
                        <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                        <p>🪐 <?php echo htmlspecialchars($row['objeto_celeste']); ?></p>
                        <p>📅 <?php echo htmlspecialchars($row['fecha_observacion']); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="grid-column: 1/-1; text-align: center; color: #a0a6ed;">No hay fotografías disponibles para este filtro.</p>
        <?php endif; ?>
    </div>

</body>
</html>