<?php
require_once "_Varios.php";

$nombre = $_POST["nombre"];
$conferencia = $_POST["conferencia"];

$conexion = obtenerPdoConexionBD();

$sql = "INSERT INTO Equipos (Nombre, ConferenciaID) VALUES (?, ?)";
$sentencia = $conexion->prepare($sql);

if ($conferencia == "Este") {
    $conferenciaID = 1;
} elseif ($conferencia == "Oeste") {
    $conferenciaID = 2;
} else {
    echo "Conferencia no válida.";
    exit;
}

$sentencia->execute([$nombre, $conferenciaID]);

header("Location: EquiposIndex.php");
?>