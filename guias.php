<?php
include 'conexion.php';

$stmt = $conexion->query("SELECT * FROM guias ORDER BY id DESC");
$guias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guías de Observación Astronómica</title>
    <style>
        body { background-color: #0b0d17; color: #a0a6ed; font-family: sans-serif; padding: 20px; }
        h1 { text-align: center; color: #4880ff; }
        nav { display: flex; justify-content: center; gap: 20px; background: #15192b; padding: 15px; border-radius: 8px; margin-bottom: 30px; }
        nav a { color: #70a1ff; text-decoration: none; font-weight: bold; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; max-width: 1000px; margin: 0 auto; }
        .card { background: #15192b; border-radius: 8px; padding: 20px; border: 1px solid #2a3150; }
        .tag { display: inline-block; background: #2a3150; color: #70a1ff; padding: 4px 8px; border-radius: 4px; font-size: 0.8em; margin-bottom: 10px; }
        .spec-item { margin: 5px 0; font-size: 0.9em; color: #a0a6ed; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="galeria.php">Galería</a>
        <a href="guias.php">Guías</a>
        <a href="bitacora.php">Bitácora</a>
        <a href="subir_foto.php">+ Registrar Foto</a>
    </nav>

    <h1>Guías de Observación Astronómica</h1>

    <div class="grid">
        <?php if (count($guias) > 0): ?>
            <?php foreach ($guias as $row): ?>
                <div class="card">
                    <span class="tag"><?php echo htmlspecialchars($row['categoria']); ?></span>
                    <h2><?php echo htmlspecialchars($row['titulo']); ?></h2>
                    <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                    <hr style="border-color: #2a3150;">
                    <div class="spec-item">🔭 <strong>Equipo:</strong> <?php echo htmlspecialchars($row['equipo_recomendado']); ?></div>
                    <div class="spec-item">🎯 <strong>Dificultad:</strong> <?php echo htmlspecialchars($row['dificultad']); ?></div>
                    <div class="spec-item">📅 <strong>Mejor época:</strong> <?php echo htmlspecialchars($row['mejor_epoca']); ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; grid-column: 1/-1;">No hay guías cargadas todavía.</p>
        <?php endif; ?>
    </div>
</body>
</html>