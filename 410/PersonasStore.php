<?php
require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$telefono = $_REQUEST["telefono"];
$estrella = ($_REQUEST["estrella"]);
$categoriaId = $_REQUEST["categoriaId"];

$sql = "INSERT INTO persona (nombre, apellidos, telefono, estrella, categoriaId) VALUES (?, ?, ?, ?, ?)";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $apellidos, $telefono, $estrella, $categoriaId]);

?>

<html>

    <head>
        <meta charset='UTF-8'>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1 {
                text-align: center;
            }

            p {
                text-align: center;
            }

            a {
                display: block;
                text-align: center;
                margin: 20px auto;
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                color: #0056b3;
            }
        </style>
    </head>

    <body>

        <h1>Inserción completada</h1>
        <p>Se ha insertado correctamente la nueva persona: <?=$nombre?> <?=$apellidos?>.</p>
        <br>
        <a href='PersonasIndex.php'>Volver al listado de personas.</a>

    </body>

</html>