<?php
require_once "_Varios.php";
require_once "_Sesion.php";

salirSiSesionFalla();

$conexion = obtenerPdoConexionBD();

$sql = "SELECT Equipos.idEquipos, Equipos.Nombre AS Equipo, Conferencias.Nombre AS Conferencia
        FROM Equipos
        INNER JOIN Conferencias ON Equipos.ConferenciaID = Conferencias.idConferencia";

$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$equipos = $sentencia->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

    <body>
        <h1>Listado de Equipos y Conferencias</h1>
        <table border='1'>
            <tr>
                <th>Equipo</th>
                <th>Conferencia</th>
                <th>Ver Jugadores</th>
                <th>Ver Partidos</th>
                <th>Eliminar Equipo</th>
            </tr>
            <?php foreach ($equipos as $equipo) { ?>
                <tr>
                    <td><?= $equipo["Equipo"] ?></td>
                    <td><?= $equipo["Conferencia"] ?></td>
                    <td><a href='JugadoresIndex.php?EquipoID=<?= $equipo["idEquipos"] ?>'>Ver Jugadores</a></td>
                    <td><a href='PartidosIndex.php?idEquipos=<?= $equipo["idEquipos"] ?>'>Ver Partidos</a></td>
                    <td><a href='EquiposDelete.php?idEquipos=<?= $equipo["idEquipos"] ?>'>Eliminar Equipo</a></td>
                </tr>
            <?php } ?>
        </table>
        <p>
            <a href='EquiposCreate.php'>Crear equipo</a>
        </p>
        <p class="cerrar-sesion">
            <a href='SesionCerrar.php'>Cerrar Sesión</a>
        </p>
    </body>
</html>