<?php
session_start();

$mensaje = "";

// Conexión con MySQL
$conexion = new mysqli("localhost", "root", "", "pwatarea3");

if ($conexion->connect_error) {
    die("Error de conexión con la base de datos.");
}

$conexion->set_charset("utf8mb4");

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim($_POST["usuario"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";
    $accion = $_POST["accion"] ?? "";

    if ($usuario == "" || $contrasena == "") {

        $mensaje = "Por favor, completa todos los campos.";

    } elseif ($accion == "registrar") {

        // Registrar un usuario nuevo
        $claveSegura = password_hash($contrasena, PASSWORD_DEFAULT);

        $consulta = $conexion->prepare(
            "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)"
        );

        $consulta->bind_param("ss", $usuario, $claveSegura);

        if ($consulta->execute()) {
            $mensaje = "¡Usuario registrado correctamente!";
        } else {
            if ($conexion->errno == 1062) {
                $mensaje = "Ese nombre de usuario ya existe.";
            } else {
                $mensaje = "No se pudo registrar el usuario.";
            }
        }

        $consulta->close();

    } elseif ($accion == "ingresar") {

        // Buscar usuario registrado
        $consulta = $conexion->prepare(
            "SELECT id, usuario, contrasena
             FROM usuarios
             WHERE usuario = ?"
        );

        $consulta->bind_param("s", $usuario);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $datos = $resultado->fetch_assoc();

        if ($datos && password_verify($contrasena, $datos["contrasena"])) {

            session_regenerate_id(true);

            $_SESSION["usuario"] = $datos["usuario"];

            $mensaje = "¡Bienvenido, " . $datos["usuario"] . "!";

        } else {

            $mensaje = "Usuario o contraseña incorrectos.";
        }

        $consulta->close();
    }
}

// Cerrar sesión
if (isset($_GET["salir"])) {
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio 6 - Inicio de Sesión</title>

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

        .contenedor {
            background-color: #ffe0c9;
            width: 380px;
            max-width: 85%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-sizing: border-box;
        }

        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #d77a57;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #d77a57;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 8px;
        }

        button:hover {
            background-color: #a94e32;
        }

        .mensaje {
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
            margin: 15px;
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
        <h1>🔐 Ejercicio 6</h1>
        <h2>Sistema de Inicio de Sesión</h2>
        <p>Programación Web Avanzada - Grupo 4</p>
    </header>

    <div class="contenedor">

        <?php if (isset($_SESSION["usuario"])) { ?>

            <h2>¡Bienvenido!</h2>

            <p>
                Has iniciado sesión como:
                <strong>
                    <?php
                    echo htmlspecialchars(
                        $_SESSION["usuario"],
                        ENT_QUOTES,
                        "UTF-8"
                    );
                    ?>
                </strong>
            </p>

            <a href="index.php?salir=1" class="volver">
                Cerrar sesión
            </a>

        <?php } else { ?>

            <h2>👤 Acceso de usuarios</h2>

            <p>Ingresa tus datos para continuar.</p>

            <form method="POST" id="formulario">

                <input
                    type="text"
                    name="usuario"
                    id="usuario"
                    placeholder="Nombre de usuario"
                    maxlength="50"
                    required
                >

                <br>

                <input
                    type="password"
                    name="contrasena"
                    id="contrasena"
                    placeholder="Contraseña"
                    required
                >

                <br>

                <button type="submit" name="accion" value="ingresar">
                    Iniciar sesión
                </button>

                <button type="submit" name="accion" value="registrar">
                    Registrarse
                </button>

            </form>

        <?php } ?>

        <?php if ($mensaje != "") { ?>

            <div class="mensaje">
                <?php
                echo htmlspecialchars(
                    $mensaje,
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
        const formulario = document.getElementById("formulario");

        if (formulario) {
            formulario.addEventListener("submit", function(event) {

                const usuario = document.getElementById("usuario").value.trim();
                const contrasena = document.getElementById("contrasena").value;

                if (usuario === "" || contrasena === "") {
                    event.preventDefault();
                    alert("Completa todos los campos.");
                }
            });
        }
    </script>

</body>
</html>