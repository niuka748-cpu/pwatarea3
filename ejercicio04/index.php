<?php
session_start();

// Crear el número secreto
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = rand(1, 20);
}

$resultado = "";

// Comprobar el número ingresado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["reiniciar"])) {

        $_SESSION["numero"] = rand(1, 20);
        $resultado = "¡Nueva partida iniciada!";

    } elseif (isset($_POST["intento"])) {

        $intento = filter_var(
            $_POST["intento"],
            FILTER_VALIDATE_INT
        );

        if ($intento === false || $intento < 1 || $intento > 20) {

            $resultado = "Ingresa un número entre 1 y 20.";

        } elseif ($intento == $_SESSION["numero"]) {

            $resultado = "¡Felicidades! Adivinaste el número.";

            $_SESSION["numero"] = rand(1, 20);

        } elseif ($intento < $_SESSION["numero"]) {

            $resultado = "Intenta con un número mayor.";

        } else {

            $resultado = "Intenta con un número menor.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio 4 - Juego de Adivinanzas</title>

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

        .juego {
            background-color: #ffe0c9;
            width: 350px;
            max-width: 85%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input {
            width: 150px;
            padding: 12px;
            border: 1px solid #d77a57;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
        }

        button {
            background-color: #d77a57;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: #a94e32;
        }

        .resultado {
            background-color: white;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            color: #a65335;
            font-weight: bold;
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
        <h1>🎮 Ejercicio 4</h1>
        <h2>Juego de Adivinanzas</h2>
        <p>Programación Web Avanzada - Grupo 4</p>
    </header>

    <div class="juego">

        <h2>¡Adivina el número!</h2>

        <p>Estoy pensando en un número del 1 al 20.</p>

        <p>¿Puedes adivinar cuál es?</p>

        <form method="POST" id="formularioJuego">

            <input
                type="number"
                name="intento"
                id="intento"
                min="1"
                max="20"
                placeholder="Tu número"
                required
            >

            <br>

            <button type="submit">
                Adivinar
            </button>

        </form>

        <form method="POST">
            <button type="submit" name="reiniciar" value="1">
                🔄 Nuevo juego
            </button>
        </form>

        <?php if ($resultado != "") { ?>

            <div class="resultado">
                <?php
                echo htmlspecialchars(
                    $resultado,
                    ENT_QUOTES,
                    "UTF-8"
                );
                ?>
            </div>

        <?php } ?>

    </div>

    <a href="../index.php" class="volver">
        ← Volver al inicio
    </a>

    <footer>
        <p>Universidad Bolivariana del Ecuador</p>
        <p>Grupo 4 - 2026</p>
    </footer>

    <script>
        document.getElementById("formularioJuego")
        .addEventListener("submit", function(event) {

            var numero = document.getElementById("intento").value;

            if (numero === "" || numero < 1 || numero > 20) {

                event.preventDefault();

                alert("Ingresa un número entre 1 y 20.");
            }
        });
    </script>

</body>
</html>