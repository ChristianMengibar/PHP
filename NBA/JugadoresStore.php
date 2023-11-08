<?php
require_once "_Varios.php";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$posicion = $_POST["posicion"];
$equipo = $_POST["equipo"];
$conferencia = $_POST["conferencia"];

$conexion = obtenerPdoConexionBD();

$sql = "INSERT INTO Jugadores (Nombre, Apellido, Posicion, EquipoID, ConferenciaID) VALUES (?, ?, ?, ?, ?)";
$sentencia = $conexion->prepare($sql);

$sqlEquipo = "SELECT idEquipos FROM Equipos WHERE Nombre = ?";
$sentenciaEquipo = $conexion->prepare($sqlEquipo);
$sentenciaEquipo->execute([$equipo]);
$equipoID = $sentenciaEquipo->fetch(PDO::FETCH_COLUMN);

if ($conferencia == "Este") {
    $conferenciaID = 1;
} elseif ($conferencia == "Oeste") {
    $conferenciaID = 2;
} else {
    echo "Conferencia no válida.";
    exit;
}

$sentencia->execute([$nombre, $apellido, $posicion, $equipoID, $conferenciaID]);

header("Location: EquiposIndex.php");
?>