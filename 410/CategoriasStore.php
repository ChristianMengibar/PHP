<?php
require_once "_Varios.php";

$nombre = $_REQUEST["nombre"];

$conexion = obtenerPdoConexionBD();
$sql = "INSERT INTO categoria (nombre) VALUES (?)";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre]);
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
        <p>Se ha insertado correctamente la nueva entrada de <?=$nombre?>.</p>

        <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

    </body>
</html>