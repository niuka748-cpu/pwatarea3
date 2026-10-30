<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grupo 4 | Programación Web Avanzada</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fff8f2;
            color: #47332d;
        }

        /* BARRA SUPERIOR */

        nav {
            background: #ffffff;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.06);
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #c46b4b;
        }

        nav a {
            text-decoration: none;
            color: #704d40;
            margin-left: 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        nav a:hover {
            color: #d97853;
        }

        /* PORTADA */

        .portada {
            background: linear-gradient(135deg, #b95f43, #e6a17e);
            color: white;
            text-align: center;
            padding: 90px 20px;
            position: relative;
            overflow: hidden;
        }

        .portada::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -140px;
            right: -80px;
        }

        .portada::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.07);
            border-radius: 50%;
            bottom: -120px;
            left: -50px;
        }

        .portada h1 {
            font-size: 46px;
            margin-bottom: 18px;
            position: relative;
            z-index: 1;
        }

        .portada p {
            font-size: 19px;
            max-width: 750px;
            margin: 0 auto 30px;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        .etiqueta {
            display: inline-block;
            background: rgba(255,255,255,0.18);
            padding: 10px 22px;
            border-radius: 30px;
            margin-bottom: 25px;
            font-weight: bold;
            position: relative;
            z-index: 1;
        }

        .boton-portada {
            display: inline-block;
            background: white;
            color: #b95f43;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            position: relative;
            z-index: 1;
        }

        .boton-portada:hover {
            background: #ffe3d2;
            transform: translateY(-3px);
        }

        /* SECCIONES */

        section {
            padding: 70px 8%;
        }

        .titulo {
            text-align: center;
            font-size: 34px;
            color: #a95439;
            margin-bottom: 15px;
        }

        .subtitulo {
            text-align: center;
            color: #82665a;
            font-size: 17px;
            margin-bottom: 45px;
        }

        /* TARJETAS DE EJERCICIOS */

        .contenedor-tarjetas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            max-width: 1200px;
            margin: auto;
        }

        .tarjeta {
            background: white;
            border-radius: 20px;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(108,61,42,0.09);
            border: 1px solid #f8e3d7;
            transition: 0.3s;
        }

        .tarjeta:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(108,61,42,0.17);
        }

        .icono {
            font-size: 46px;
            margin-bottom: 20px;
            display: block;
        }

        .numero {
            display: inline-block;
            background: #fff0e7;
            color: #bc6648;
            padding: 7px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .tarjeta h3 {
            font-size: 21px;
            margin-bottom: 15px;
            color: #663f32;
        }

        .tarjeta p {
            font-size: 15px;
            line-height: 1.7;
            color: #80685e;
            min-height: 75px;
        }

        .boton {
            display: inline-block;
            background: linear-gradient(135deg, #c76e4b, #e39470);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 25px;
            margin-top: 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        .boton:hover {
            background: #a94e32;
            transform: scale(1.05);
        }

        /* SECCIÓN INFORMATIVA */

        .informacion {
            background: #ffebdf;
            text-align: center;
        }

        .informacion p {
            max-width: 850px;
            margin: auto;
            font-size: 17px;
            line-height: 1.9;
            color: #725348;
        }

        /* INTEGRANTES */

        .integrantes {
            background: white;
        }

        .equipo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1100px;
            margin: auto;
        }

        .persona {
            background: #fff3eb;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            width: 195px;
            border: 1px solid #f4d9ca;
            transition: 0.3s;
        }

        .persona:hover {
            transform: translateY(-6px);
            background: #ffe4d4;
        }

        .avatar {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #c76e4b, #e9ad8c);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            font-size: 29px;
            color: white;
        }

        .persona h3 {
            font-size: 16px;
            color: #704637;
            margin-bottom: 8px;
        }

        .persona p {
            color: #a16d58;
            font-size: 13px;
        }

        /* PIE DE PÁGINA */

        footer {
            background: #633b30;
            color: white;
            text-align: center;
            padding: 35px 20px;
        }

        footer p {
            margin: 8px 0;
            font-size: 14px;
        }

        /* DISEÑO RESPONSIVE */

        @media (max-width: 950px) {
            .contenedor-tarjetas {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            nav {
                justify-content: center;
                text-align: center;
            }

            nav a {
                margin: 0 8px;
                font-size: 13px;
            }

            .portada {
                padding: 65px 20px;
            }

            .portada h1 {
                font-size: 32px;
            }

            .portada p {
                font-size: 16px;
            }

            section {
                padding: 50px 20px;
            }

            .titulo {
                font-size: 27px;
            }

            .contenedor-tarjetas {
                grid-template-columns: 1fr;
            }

            .tarjeta p {
                min-height: auto;
            }
        }
    </style>
</head>

<body>

    <!-- MENÚ SUPERIOR -->

    <nav>
        <div class="logo">💻 GRUPO 4</div>

        <div>
            <a href="#inicio">Inicio</a>
            <a href="#ejercicios">Ejercicios</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#integrantes">Integrantes</a>
        </div>
    </nav>

    <!-- PORTADA PRINCIPAL -->

    <header class="portada" id="inicio">

        <div class="etiqueta">
            🎓 Universidad Bolivariana del Ecuador
        </div>

        <h1>🌐 Programación Web Avanzada</h1>

        <p>
            Bienvenidos a nuestro proyecto académico.
            Un espacio donde ponemos en práctica nuestros
            conocimientos de HTML, CSS, JavaScript, PHP y MySQL
            mediante seis ejercicios interactivos.
        </p>

        <a href="#ejercicios" class="boton-portada">
            🚀 Explorar ejercicios
        </a>

    </header>

    <!-- EJERCICIOS -->

    <section id="ejercicios">

        <h2 class="titulo">Nuestros Ejercicios</h2>

        <p class="subtitulo">
            Tarea Práctica 3 | Explora cada actividad desarrollada
        </p>

        <div class="contenedor-tarjetas">

            <!-- EJERCICIO 1 -->

            <div class="tarjeta">

                <span class="icono">📋</span>

                <span class="numero">EJERCICIO 01</span>

                <h3>Menú Desplegable</h3>

                <p>
                    Implementación de un menú interactivo
                    utilizando HTML, CSS y JavaScript.
                </p>

                <a href="ejercicio01/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

            <!-- EJERCICIO 2 -->

            <div class="tarjeta">

                <span class="icono">📩</span>

                <span class="numero">EJERCICIO 02</span>

                <h3>Formulario de Contacto</h3>

                <p>
                    Formulario con validación de datos
                    utilizando JavaScript y PHP.
                </p>

                <a href="ejercicio02/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

            <!-- EJERCICIO 3 -->

            <div class="tarjeta">

                <span class="icono">📊</span>

                <span class="numero">EJERCICIO 03</span>

                <h3>Contador de Visitas</h3>

                <p>
                    Sistema que registra y muestra
                    la cantidad de visitas mediante PHP.
                </p>

                <a href="ejercicio03/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

            <!-- EJERCICIO 4 -->

            <div class="tarjeta">

                <span class="icono">🎮</span>

                <span class="numero">EJERCICIO 04</span>

                <h3>Juego de Adivinanzas</h3>

                <p>
                    Juego interactivo para descubrir
                    un número secreto utilizando PHP.
                </p>

                <a href="ejercicio04/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

            <!-- EJERCICIO 5 -->

            <div class="tarjeta">

                <span class="icono">🖼️</span>

                <span class="numero">EJERCICIO 05</span>

                <h3>Galería de Imágenes</h3>

                <p>
                    Galería dinámica que muestra fotografías
                    almacenadas en una carpeta mediante PHP.
                </p>

                <a href="ejercicio05/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

            <!-- EJERCICIO 6 -->

            <div class="tarjeta">

                <span class="icono">🔐</span>

                <span class="numero">EJERCICIO 06</span>

                <h3>Inicio de Sesión</h3>

                <p>
                    Sistema de registro e inicio de sesión
                    conectado a una base de datos MySQL.
                </p>

                <a href="ejercicio06/index.php" class="boton">
                    Ver ejercicio →
                </a>

            </div>

        </div>

    </section>

    <!-- INFORMACIÓN DEL PROYECTO -->

    <section class="informacion" id="nosotros">

        <h2 class="titulo">💡 Sobre Nuestro Proyecto</h2>

        <p>
            Este proyecto fue desarrollado por los estudiantes
            del Grupo 4 de la Universidad Bolivariana del Ecuador,
            como parte de la asignatura Programación Web Avanzada.

            Nuestro objetivo es aplicar los conocimientos adquiridos
            durante las clases mediante el desarrollo de aplicaciones
            web funcionales, utilizando diferentes herramientas
            y tecnologías de programación.
        </p>

    </section>

    <!-- INTEGRANTES -->

    <section class="integrantes" id="integrantes">

        <h2 class="titulo">👩‍💻 Nuestro Equipo</h2>

        <p class="subtitulo">
            Conoce a los integrantes del Grupo 4
        </p>

        <div class="equipo">

            <div class="persona">
                <div class="avatar">👩‍💻</div>
                <h3>Norka Mideros</h3>
                <p>Integrante del Grupo 4</p>
            </div>

            <div class="persona">
                <div class="avatar">👨‍💻</div>
                <h3>Jorge Villamar</h3>
                <p>Integrante del Grupo 4</p>
            </div>

            <div class="persona">
                <div class="avatar">👨‍💻</div>
                <h3>Bruce Balarezo</h3>
                <p>Integrante del Grupo 4</p>
            </div>

            <div class="persona">
                <div class="avatar">👨‍💻</div>
                <h3>Chinlle Carrillo</h3>
                <p>Integrante del Grupo 4</p>
            </div>

            <div class="persona">
                <div class="avatar">👩‍💻</div>
                <h3>Liseth Criollo</h3>
                <p>Integrante del Grupo 4</p>
            </div>

        </div>

    </section>

    <!-- PIE DE PÁGINA -->

    <footer>

        <h3>💻 Programación Web Avanzada</h3>

        <p>Universidad Bolivariana del Ecuador</p>

        <p>Tarea Práctica 3 | Grupo 4</p>

        <p>© 2026 - Proyecto Académico</p>

    </footer>

</body>
</html>