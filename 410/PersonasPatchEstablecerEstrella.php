<?php
require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$estrella = !($_REQUEST["estrella"]);
$id = ($_REQUEST["id"]);

$sql = "UPDATE persona SET estrella=? WHERE id=?";

$sentencia = $conexion->prepare($sql);
$actualizado = $sentencia->execute([$estrella, $id]);

if ($actualizado) {
    header("Location: PersonasIndex.php");
    exit;
}
?>