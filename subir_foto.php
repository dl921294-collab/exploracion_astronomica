<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nueva Fotografía</title>
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
        body { background: #0b0d17; color: #a0a6ed; font-family: sans-serif; padding: 20px; }
        .form-container { max-width: 500px; margin: 0 auto; background: #181c30; padding: 25px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #70a1ff; }
        input, textarea { width: 100%; padding: 8px; background: #0b0d17; border: 1px solid #2a3150; color: #fff; border-radius: 4px; box-sizing: border-box; }
        button { background: #70a1ff; color: #0b0d17; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; width: 100%; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="galeria.php">Galería</a>
        <a href="guias.php">Guías</a>
        <a href="bitacora.php">Bitácora</a>
    </nav>

    <div class="form-container">
        <h2>Añadir a la Bitácora</h2>
        <form action="procesar_subida.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Título de la Captura</label>
                <input type="text" name="titulo" required placeholder="Ej: Nebulosa de Orión M42">
            </div>
            <div class="form-group">
                <label>Objeto Celeste</label>
                <input type="text" name="objeto_celeste" required placeholder="Ej: Espacio Profundo / Planeta">
            </div>
            <div class="form-group">
                <label>Fecha de Observación</label>
                <input type="date" name="fecha_observacion" required>
            </div>
            <div class="form-group">
                <label>Telescopio / Lente</label>
                <input type="text" name="telescopio" placeholder="Ej: Refractor 80mm ED">
            </div>
            <div class="form-group">
                <label>Cámara</label>
                <input type="text" name="camara" placeholder="Ej: ZWO ASI533MC / DSLR Canon">
            </div>
            <div class="form-group">
                <label>Tiempo de Exposición</label>
                <input type="text" name="tiempo_exposicion" placeholder="Ej: 60 x 30s (30 min total)">
            </div>
            <div class="form-group">
                <label>Archivo de Imagen</label>
                <input type="file" name="imagen" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Notas de la Sesión</label>
                <textarea name="notas" rows="3" placeholder="Condiciones del cielo, filtro utilizado, etc."></textarea>
            </div>
            <button type="submit">Guardar Registro</button>
        </form>
    </div>
</body>
</html>