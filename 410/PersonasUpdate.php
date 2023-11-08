<?php
require_once "_Varios.php";

$id = (int)$_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$telefono = $_REQUEST["telefono"];
$estrella = isset($_REQUEST["estrella"]) ? 1 : 0;
$categoriaId = (int)$_REQUEST["categoriaId"];

$conexion = obtenerPdoConexionBD();
$sql = "UPDATE persona SET nombre=?, apellidos=?, telefono=?, estrella=?, categoriaId=? WHERE id=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $apellidos, $telefono, $estrella, $categoriaId, $id]);
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

        <h1>Actualización completada</h1>
        <p>Se han guardado correctamente los nuevos datos de <?=$nombre?> <?=$apellidos?>.</p>

        <a href='PersonasIndex.php'>Volver al listado de personas</a>

    </body>

</html>