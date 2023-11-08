<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$id = $_GET["id"];

$sql = $conexion ->prepare("DELETE FROM categoria WHERE id=?");
$eliminado = $sql -> execute([$id]);

if ($eliminado){
    header("Location: 400-CategoriasIndex.php");
    exit();
}

?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Eliminar Categoría</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                h1 {
                    color: #333;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }

                p {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <h1>Eliminar Categoría</h1>
            <br>
            <a href="400-CategoriasIndex.php">Volver a la lista de categorías</a>
            <br>
        </body>
    </html>
</html>