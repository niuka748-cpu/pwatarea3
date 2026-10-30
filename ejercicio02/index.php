<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");

    if ($nombre == "" || $correo == "" || $mensaje == "") {
        $resultado = "Por favor, complete todos los campos.";
    }
    elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $resultado = "Ingrese un correo electrónico válido.";
    }
    else {
        $resultado = "¡Formulario completado correctamente!";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio 2 - Formulario de Contacto</title>

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

        .formulario {
            background-color: #ffe0c9;
            width: 350px;
            max-width: 85%;
            margin: 35px auto;
            padding: 25px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #d77a57;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        button {
            background-color: #d77a57;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #a94e32;
        }

        #resultado {
            margin-top: 15px;
            font-weight: bold;
            color: #a65335;
        }

        .volver {
            display: inline-block;
            background-color: #c76e4b;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <header>
        <h1>✉️ Ejercicio 2</h1>
        <h2>Formulario de Contacto</h2>
        <p>Programación Web Avanzada - Grupo 4</p>
    </header>

    <div class="formulario">

        <h2>Contáctanos</h2>

        <p>Complete el siguiente formulario.</p>

        <form id="formularioContacto" method="POST">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4"></textarea>

            <button type="submit">Enviar mensaje</button>

        </form>

        <p id="resultado">
            <?php
                echo htmlspecialchars($resultado, ENT_QUOTES, "UTF-8");
            ?>
        </p>

    </div>

    <a href="../index.php" class="volver">
        ← Volver al inicio
    </a>

    <script>
        document.getElementById("formularioContacto")
        .addEventListener("submit", function(event) {

            var nombre = document.getElementById("nombre").value.trim();
            var correo = document.getElementById("correo").value.trim();
            var mensaje = document.getElementById("mensaje").value.trim();

            if (nombre == "" || correo == "" || mensaje == "") {

                event.preventDefault();

                document.getElementById("resultado").innerHTML =
                    "Por favor, complete todos los campos.";

            }
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {

                event.preventDefault();

                document.getElementById("resultado").innerHTML =
                    "Ingrese un correo electrónico válido.";
            }

        });
    </script>

</body>
</html>