<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

if (isset($_GET["id"])) {
    $idCategoria = $_GET["id"];

$sql = $conexion->prepare("SELECT nombre FROM categoria WHERE id = ?");
$sql->execute([$idCategoria]);
$resultado = $sql->fetch();

if ($resultado) {
    $nombreCategoria = $resultado["nombre"];
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Ver Categoría</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <h1>Categoría: <?= $nombreCategoria ?></h1>
            <p>Nombre: <?= $nombreCategoria ?></p>
            <a href="400-CategoriasIndex.php">Volver a la lista de categorías</a>
        </body>
    </html>


<?php
} else {
    echo "<br>";
    echo "No se encontró la categoría con el ID proporcionado.";
}
} else {
    echo "<br>";
    echo "<br>";
    echo "No se encuentra el ID de la categoría.";
}
?>