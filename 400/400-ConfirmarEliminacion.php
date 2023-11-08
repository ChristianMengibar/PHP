<?php
require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$id = $_GET["id"];

?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Confirmar Eliminación</title>
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
            <h1>Confirmar Eliminación</h1>
            <a href="400-CategoriasDestroy.php?id=<?= $id ?>">CONFIRMAR</a>
            <br>
            <br>
            <a href="400-CategoriasIndex.php">Cancelar</a>
        </body>
    </html>
</html>