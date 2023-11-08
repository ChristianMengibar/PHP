<?php
require_once "_Varios.php";

if (isset($_GET['idEquipos'])) {
    $idEquipos = (int)$_GET['idEquipos'];
} else {
    redireccionar("EquiposIndex.php?mensaje=error");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexionBD = obtenerPdoConexionBD();
    $sql = "DELETE FROM Equipos WHERE idEquipos = ?";
    $sentencia = $conexionBD->prepare($sql);
    $correcto = $sentencia->execute([$idEquipos]);

    if ($correcto) {
        redireccionar("EquiposIndex.php?mensaje=eliminado");
    } else {
        redireccionar("EquiposIndex.php?mensaje=error");
    }
}

$conexionBD = obtenerPdoConexionBD();
$sql = "SELECT Nombre FROM Equipos WHERE idEquipos = ?";
$sentenciaConf = $conexionBD->prepare($sql);
$sentenciaConf->execute([$idEquipos]);
$equipo = $sentenciaConf->fetch();

if (!$equipo) {
    redireccionar("EquiposIndex.php?mensaje=error");
}

?>

<!doctype html>
<html lang="es">
    <head>
        <head>
            <meta charset='UTF-8'>
            <link rel="stylesheet" type="text/css" href="estilos.css">
        </head>
    </head>

    <body>
        <h1>Confirmar Eliminación</h1>
        <p>¿Estás seguro de que deseas eliminar el equipo <?= $equipo['Nombre'] ?>?</p>
        <form method="post">
            <div class="form-group">
                <input type="submit" value="Sí, eliminar">
            </div>
            <div class="form-group">
                <a href="EquiposIndex.php">No, cancelar</a>
            </div>
        </form>
    </body>
</html>