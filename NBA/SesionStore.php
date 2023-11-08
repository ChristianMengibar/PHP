<?php
require_once "_Varios.php";

$identificador = $_POST["identificador"];
$contrasenna = $_POST["contrasenna"];
$tipoUsuario = $_POST["tipoUsuario"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];

$conexion = obtenerPdoConexionBD();

$sql = "INSERT INTO usuario (identificador, contrasenna, tipoUsuario, nombre, apellidos) VALUES (?, ?, ?, ?, ?)";
$sentencia = $conexion->prepare($sql);

$sentencia->execute([$identificador, $contrasenna, $tipoUsuario, $nombre, $apellidos]);

header("Location: SesionFormulario.php");
?>