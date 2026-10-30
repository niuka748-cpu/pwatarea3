<?php

// Archivo donde se guardan las visitas
$archivo = __DIR__ . "/visitas.txt";

// Leer el contador
$visitas = 0;

$contador = fopen($archivo, "c+");

if ($contador) {

    if (flock($contador, LOCK_EX)) {

        rewind($contador);

        $visitas = (int) trim(stream_get_contents($contador));

        // Aumentar una visita
        $visitas = $visitas + 1;

        // Guardar las visitas
        rewind($contador);
        ftruncate($contador, 0);
        fwrite($contador, $visitas);
        fflush($contador);

        flock($contador, LOCK_UN);
    }

    fclose($contador);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio 3 - Contador de Visitas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5eb;
            margin: 0;
            text-align: center;
            color: #4a2c22;
        }

        header {
            background-color: #c76e4b;
            color: white;
            padding: 25px;
        }

        header h2 {
            color: white;
        }

        .contador {
            background-color: #ffe0c9;
            width: 350px;
            max-width: 85%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .numero {
            background-color: white;
            color: #a65335;
            font-size: 55px;
            font-weight: bold;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .boton {
            display: inline-block;
            background-color: #d77a57;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            font-size: 15px;
        }

        .boton:hover {
            background-color: #a94e32;
        }

        footer {
            background-color: #c76e4b;
            color: white;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <header>
        <h1>📊 Ejercicio 3</h1>
        <h2>Contador de Visitas</h2>
        <p>Programación Web Avanzada - Grupo 4</p>
    </header>

    <div class="contador">

        <h2>¡Bienvenido!</h2>

        <p>Esta página ha sido visitada:</p>

        <div class="numero">
            <?php echo $visitas; ?>
        </div>

        <p>veces</p>

        <button class="boton" onclick="location.reload()">
            🔄 Actualizar contador
        </button>

    </div>

    <a href="../index.php" class="boton">
        ← Volver al inicio
    </a>

    <footer>
        <p>Universidad Bolivariana del Ecuador</p>
        <p>Grupo 4 - 2026</p>
    </footer>

</body>
</html>