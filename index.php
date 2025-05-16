<?php
include "agusmadev-haunter.php";

$fuente = "MySQL";
$mensajes = [];

try {
    $mysql = haunter::deMySQL("localhost", "evoluciona", "evoluciona", "evoluciona", "productos");
    $fuente = "MySQL › productos";

    $mysql->aCSV("salida.csv");
    $mensajes[] = ["tipo" => "csv", "texto" => "🟠 Archivo CSV generado correctamente ➜ <strong>salida.csv</strong>"];

    $mysql->aXML("salida.xml");
    $mensajes[] = ["tipo" => "xml", "texto" => "📘 XML exportado exitosamente ➜ <strong>salida.xml</strong>"];

    $mysql->aJSON("salida.json");
    $mensajes[] = ["tipo" => "json", "texto" => "🔵 JSON disponible ➜ <strong>salida.json</strong>"];

    $mysql->aSQLite("salida.sqlite3");
    $mensajes[] = ["tipo" => "sqlite", "texto" => "🟣 Base de datos SQLite creada ➜ <strong>salida.sqlite3</strong>"];

} catch (Exception $e) {
    $mensajes[] = ["tipo" => "error", "texto" => "❌ Error: " . $e->getMessage()];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Haunter · Exportación de Datos</title>
    <style>
        :root {
            --primary: #834F5E;
            --secondary: #B87CCC;
            --accent: #1C1C1C; /* Más contrastado para fondo */
            --text-light: #f0f0f0;

            --csv-bg: #A66C97;
            --xml-bg: #B87CCC;
            --json-bg: #8B6C79;
            --sqlite-bg: #6D4B57;
            --error-bg: #C74A5B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--primary); /* Swap: ahora el canvas es el fondo */
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: var(--text-light);
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            background: var(--accent); /* Swap: canvas ahora con fondo oscuro */
            border-radius: 1.2rem;
            padding: 2.5rem;
            max-width: 720px;
            width: 100%;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-size: 2.2rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .subtitulo {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #ccc;
        }

        .mensaje {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            font-weight: 500;
            color: #fff;
            animation: fadein 0.6s ease-in-out;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        .csv    { background-color: var(--csv-bg); }
        .xml    { background-color: var(--xml-bg); }
        .json   { background-color: var(--json-bg); }
        .sqlite { background-color: var(--sqlite-bg); }
        .error  { background-color: var(--error-bg); }

        footer {
            margin-top: 2rem;
            font-size: 0.85rem;
            text-align: center;
            color: var(--secondary);
        }

        strong {
            color: #fff;
        }

        @keyframes fadein {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>📦 Exportación completada</h1>
        <p class="subtitulo">Fuente de datos: <strong><?= htmlspecialchars($fuente) ?></strong></p>

        <?php foreach ($mensajes as $msg): ?>
            <div class="mensaje <?= htmlspecialchars($msg['tipo']) ?>">
                <?= $msg['texto'] ?>
            </div>
        <?php endforeach; ?>

        <footer>© <?= date('Y') ?> Haunter by Agustín Morcillo</footer>
    </div>
</body>
</html>
