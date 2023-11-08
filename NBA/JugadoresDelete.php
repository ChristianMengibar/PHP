<?php
require_once "_Varios.php";

if (isset($_GET["nombre"]) && isset($_GET["apellido"])) {
    $nombre = $_GET["nombre"];
    $apellido = $_GET["apellido"];
} else {
    redireccionar("EquiposIndex.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirmar"])) {
    $conexion = obtenerPdoConexionBD();

    $sql = "DELETE FROM Jugadores WHERE Nombre = :nombre AND Apellido = :apellido";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":apellido", $apellido);

    if ($sentencia->execute()) {
        redireccionar("EquiposIndex.php");
    } else {
        echo "Error al eliminar el jugador. <a href='EquiposIndex.php'>Volver</a>";
        die();
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <h1>Confirmar Eliminación</h1>
        <p>¿Estás seguro de que deseas eliminar al jugador <?=$nombre?> <?=$apellido?>?</p>
        <form method="post">
            <div class="form-group">
                <input type="submit" name="confirmar" value="Sí, eliminar">
            </div>
            <div class="form-group">
                <a href="EquiposIndex.php">No, cancelar</a>
            </div>
        </form>
    </body>
</html>