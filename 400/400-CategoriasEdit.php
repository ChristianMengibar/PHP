<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$id = $_GET["id"];

$sql = $conexion ->prepare("SELECT * FROM categoria WHERE id=?");
$sql -> execute([$id]);

$resultado = $sql->fetch();

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Ver Edit</title>

            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }

                h1 {
                    color: #333;
                }

                input[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                }

                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>

        <body>
            <h1>Nueva Categoria</h1>

            <form action="400-CategoriasUpdate.php" method="POST">
                <input type="hidden" name="id" value="<?= $resultado["id"] ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?= $resultado["nombre"] ?>">
                <input type="submit" value="Guardar">
            </form>

            <br>
            <a href="400-CategoriasCreate.php">Crear categoria</a>
            <br>
            <br>
            <a href="400-CategoriasIndex.php">Volver a la lista de categorías</a>
        </body>
    </html>
</html>