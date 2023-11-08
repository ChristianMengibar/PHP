<?php
require_once "_Varios.php";

$idJugadores = $_REQUEST["idJugadores"];

$conexion = obtenerPdoConexionBD();

$sql = "SELECT *
        FROM Jugadores 
        WHERE idJugadores=?";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([$idJugadores]);
$jugador = $sentencia->fetch();

if ($jugador == false) {
    header("Location: EquiposIndex.php");
}

$sqlPosiciones = "SELECT DISTINCT Posicion FROM Jugadores";
$sentenciaPosiciones = $conexion->query($sqlPosiciones);
$posicionesDisponibles = $sentenciaPosiciones->fetchAll(PDO::FETCH_COLUMN);

?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <h1>Editar Jugador</h1>
        <div class="form-group">
            <form action="JugadoresUpdate.php" method="POST">
                <input type="hidden" name="idJugadores" value="<?=$jugador["idJugadores"]?>">
                <input type="hidden" name="EquipoID" value="<?=$jugador["EquipoID"]?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?=$jugador["Nombre"]?>">
                <br>
                <br>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?=$jugador["Apellido"]?>">
                <br>
                <br>
                <label for="posicion">Posición:</label>
                <select name="posicion" class="custom-select">
                    <?php foreach ($posicionesDisponibles as $posicion) { ?>
                        <option value="<?=$posicion?>" <?php if ($posicion == $jugador["Posicion"]) echo "selected"; ?>><?=$posicion?></option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <input type="submit" value="Guardar">
            </form>
        </div>

        <p>
            <a href="EquiposIndex.php">Volver al listado de equipos</a>
        </p>
    </body>
</html>