<?php
require_once "_Varios.php";
require_once "_Sesion.php";

salirSiSesionFalla();

$conexion = obtenerPdoConexionBD();

$idEquipos = (isset($_GET['idEquipos'])) ? (int)$_GET['idEquipos'] : null;

if (!$idEquipos) {
    echo "Equipo no válido.";
    exit();
}

$sqlEquipo = "SELECT Nombre FROM Equipos WHERE idEquipos=?";
$sentenciaEquipo = $conexion->prepare($sqlEquipo);
$sentenciaEquipo->execute([$idEquipos]);
$equipo = $sentenciaEquipo->fetch();

$sql = "SELECT Partidos.idPartidos, EquipoLocal.Nombre AS ELocal, EquipoVisitante.Nombre AS EVisitante, PuntosLocal, PuntosVisitante
        FROM Partidos
        INNER JOIN Equipos AS EquipoLocal ON Partidos.EquipoLocalID = EquipoLocal.idEquipos
        INNER JOIN Equipos AS EquipoVisitante ON Partidos.EquipoVisitanteID = EquipoVisitante.idEquipos
        WHERE Partidos.EquipoLocalID = ? OR Partidos.EquipoVisitanteID = ?";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([$idEquipos, $idEquipos]);
$partidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//var_dump($partidos);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

    <body>
        <h1>Partidos del Equipo</h1>
        <h2>
            <?php
                echo $equipo['Nombre'];
            ?>
        </h2>
        <table border='1'>
            <tr>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Puntos Local</th>
                <th>Puntos Visitante</th>
            </tr>
            <?php foreach ($partidos as $partido) { ?>
                <tr>
                    <td><?= $partido["ELocal"] ?></td>
                    <td><?= $partido["EVisitante"] ?></td>
                    <td><?= $partido["PuntosLocal"] ?></td>
                    <td><?= $partido["PuntosVisitante"] ?></td>
                </tr>
            <?php } ?>
        </table>
        <p>
            <a href='EquiposIndex.php'>Volver al listado de equipos</a>
        </p>
        <p class="cerrar-sesion">
            <a href='SesionCerrar.php'>Cerrar Sesión</a>
        </p>
    </body>
</html>