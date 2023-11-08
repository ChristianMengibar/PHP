<?php
require_once "_Varios.php";

$id = (int)$_REQUEST["id"];
$nombre = $_REQUEST["nombre"];

$conexion = obtenerPdoConexionBD();
$sql = "UPDATE categoria SET nombre=? WHERE id=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $id]);
?>

<html>
    <head>
        <meta charset='UTF-8'>
    </head>

    <body>

        <h1>Actualización completada</h1>
        <p>Se han guardado correctamente los nuevos datos de <?=$nombre?>.</p>

        <a href='Categorias.php'>Volver al listado de categorías.</a>

    </body>
</html>