<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácora Astronómica</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0b0d17;
            color: #a0a6ed;
        }
        header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), #101426;
            padding: 50px 20px;
            text-align: center;
        }
        header h1 {
            color: #4880ff;
            margin-bottom: 10px;
        }
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
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #181c30;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #2a3150;
        }
        .card h3 {
            color: #70a1ff;
            margin-top: 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Exploración Astronómica</h1>
        <p>Observación del cosmos, astrofotografía y guías del cielo nocturno</p>
    </header>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="galeria.php">Galería</a>
        <a href="guias.php">Guías</a>
        <a href="bitacora.php">Bitácora</a>
        <a href="subir_foto.php">+ Registrar Foto</a>
    </nav>

    <main class="container">
        <section id="galeria">
            <h2>Galería de Observación</h2>
            <div class="card-grid">
                <div class="card">
                    <h3>Superficie Lunar</h3>
                    <p>Registro de cráteres principales y mares lunares.</p>
                </div>
                <div class="card">
                    <h3>Júpiter y Lunas Galileanas</h3>
                    <p>Detalles de las bandas nubosas y satélites principales.</p>
                </div>
            </div>
        </section>
    </main>

</body>
</html>