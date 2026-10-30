<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Menú desplegable</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5eb;
            text-align: center;
            margin: 0;
        }

        h1 {
            background-color: #c76e4b;
            color: white;
            padding: 25px;
        }

        .menu {
            width: 250px;
            margin: 40px auto;
        }

        button {
            background-color: #d77a57;
            color: white;
            padding: 15px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .opciones {
            display: none;
            background-color: #ffe0c9;
        }

        .opciones a {
            display: block;
            padding: 12px;
            color: #713b29;
            text-decoration: none;
        }

        .opciones a:hover {
            background-color: #e6a07d;
        }
    </style>
</head>

<body>

    <h1>Ejercicio 1: Menú desplegable</h1>

    <p>Haz clic en el botón para mostrar las opciones.</p>

    <div class="menu">

        <button onclick="mostrarMenu()">
            Mostrar menú ▼
        </button>

        <div class="opciones" id="opciones">
            <a href="../index.php">Inicio</a>
            <a href="../ejercicio02/index.php">Contacto</a>
            <a href="../ejercicio05/index.php">Galería</a>
        </div>

    </div>

    <script>
        function mostrarMenu() {
            var menu = document.getElementById("opciones");

            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }
    </script>

</body>
</html>