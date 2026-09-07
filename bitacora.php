<?php
include 'conexion.php';

$stmt = $conexion->query("SELECT * FROM bitacora ORDER BY fecha DESC");
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bitácora de Observación</title>
    <style>
        body { background-color: #0b0d17; color: #a0a6ed; font-family: sans-serif; padding: 20px; }
        h1 { text-align: center; color: #4880ff; }
        nav { display: flex; justify-content: center; gap: 20px; background: #15192b; padding: 15px; border-radius: 8px; margin-bottom: 30px; }
        nav a { color: #70a1ff; text-decoration: none; font-weight: bold; }
        .table-container { max-width: 900px; margin: 0 auto; background: #15192b; border-radius: 8px; overflow: hidden; border: 1px solid #2a3150; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 12px 15px; border-bottom: 1px solid #2a3150; font-size: 0.9em; }
        th { background: #1c223c; color: #70a1ff; }
        tr:hover { background: #181d35; }
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

    <h1>Bitácora de Observación</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Objeto / Evento</th>
                    <th>Equipo Usado</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($registros) > 0): ?>
                    <?php foreach ($registros as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
                            <td><strong><?php echo htmlspecialchars($row['objeto']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['equipo']); ?></td>
                            <td><?php echo htmlspecialchars($row['notas']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 20px;">No hay registros en la bitácora todavía.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>