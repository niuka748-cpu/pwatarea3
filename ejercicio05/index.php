<?php

// Carpeta donde se encuentran las imágenes
$carpeta = "imagenes/";

// Buscar las imágenes guardadas
$imagenes = glob($carpeta . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio 5 - Galería de Imágenes</title>

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

        .galeria {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 30px;
        }

        .imagen {
            background-color: #ffe0c9;
            padding: 15px;
            border-radius: 10px;
            width: 250px;
        }

        .imagen img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
        }

        .imagen p {
            color: #a65335;
            font-weight: bold;
        }

        .imagen:hover {
            background-color: #f5c4a8;
        }

        .volver {
            display: inline-block;
            background-color: #d77a57;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px;
        }

        .volver:hover {
            background-color: #a94e32;
        }

        footer {
            background-color: #c76e4b;
            color: white;
            padding: 15px;
            margin-top: 30px;
        }
    </style>

</head>

<body>

    <header>
        <h1>🖼️ Ejercicio 5</h1>
        <h2>Galería de Imágenes</h2>
        <p>Programación Web Avanzada - Grupo 4</p>
    </header>

    <h2>Nuestra Galería</h2>

    <p>Imágenes cargadas mediante PHP.</p>

    <div class="galeria">

        <?php

        if (count($imagenes) > 0) {

            foreach ($imagenes as $imagen) {

                $nombre = basename($imagen);

                echo '<div class="imagen">';

                echo '<img src="' .
                     htmlspecialchars($imagen, ENT_QUOTES, "UTF-8") .
                     '" alt="Imagen de la galería">';

                echo '<p>' .
                     htmlspecialchars($nombre, ENT_QUOTES, "UTF-8") .
                     '</p>';

                echo '</div>';
            }

        } else {

            echo "<p>No hay imágenes disponibles.</p>";

        }

        ?>

    </div>

    <a href="../index.php" class="volver">
        ← Volver al inicio
    </a>

    <footer>
        <p>Universidad Bolivariana del Ecuador</p>
        <p>Grupo 4 - 2026</p>
    </footer>

</body>
</html>