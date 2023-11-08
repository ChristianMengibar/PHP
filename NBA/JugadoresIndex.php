<?php
require_once "_Varios.php";
require_once "_Sesion.php";

salirSiSesionFalla();

$equipoSeleccionado = $_REQUEST["EquipoID"];

$conexion = obtenerPdoConexionBD();

$sql = "SELECT j.idJugadores, j.Nombre, j.Apellido, j.Posicion, e.Nombre AS NombreEquipo
        FROM Jugadores j
        INNER JOIN Equipos e ON j.EquipoID = e.idEquipos
        WHERE e.idEquipos = ?
        ORDER BY j.Apellido, j.Nombre";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([$equipoSeleccionado]);
$jugadores = $sentencia->fetchAll();
?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
         <h1>Jugadores del Equipo <?= $jugadores[0]["NombreEquipo"] ?> </h1>
        <table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Posición</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($jugadores as $jugador) { ?>
                <tr>
                    <td><?=$jugador["Nombre"]?></td>
                    <td><?=$jugador["Apellido"]?></td>
                    <td><?=$jugador["Posicion"]?></td>
                    <td><a href="JugadoresEdit.php?idJugadores=<?=$jugador["idJugadores"]?>">Editar</a></td>
                    <td><a href="JugadoresDelete.php?nombre=<?=$jugador['Nombre']?>&apellido=<?=$jugador['Apellido']?>">Eliminar</a></td>
                </tr>
            <?php } ?>
        </table>
        <p>
            <a href="JugadoresCreate.php?equipoID=<?=$equipoSeleccionado?>">Añadir jugador</a>
        </p>
        <p>
            <a href="EquiposIndex.php">Volver al listado de equipos</a>
        </p>
         <p class="cerrar-sesion">
             <a href='SesionCerrar.php'>Cerrar Sesion</a>
         </p>
    </body>
</html>