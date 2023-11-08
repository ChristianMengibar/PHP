<?php
require_once "_Varios.php";

$idJugadores = $_POST["idJugadores"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$posicion = $_POST["posicion"];
$EquipoID = $_POST["EquipoID"];

$conexion = obtenerPdoConexionBD();

$sql = "UPDATE Jugadores SET Nombre=?, Apellido=?, Posicion=? WHERE idJugadores=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$nombre, $apellido, $posicion, $idJugadores]);
$rs = $sentencia->fetch();
header("Location: JugadoresIndex.php?EquipoID=$EquipoID");

?>