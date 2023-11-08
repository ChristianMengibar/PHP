<?php
require_once "_Varios.php";

$id = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlCategoria = "SELECT * FROM categoria WHERE id=?";
$select = $conexion->prepare($sqlCategoria);
$select->execute([$id]);
$fila = $select->fetch();

$nombre = $fila["nombre"];
?>

<html>
    <head>
        <meta charset='UTF-8'>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1 {
                text-align: center;
            }

            form {
                width: 50%;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }

            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
            }

            input[type="submit"] {
                background-color: #007BFF;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            a {
                display: block;
                text-align: center;
                margin: 20px auto;
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                color: #0056b3;
            }
        </style>
    </head>

    <body>

        <h1>Editar categoría</h1>

        <form method='get' action='CategoriasUpdate.php'>

            <input type='hidden' name='id' value='<?=$id?>' />

            <label for='nombre'>Nombre</label>
            <input type='text' id='nombre' name='nombre' value='<?=$nombre?>' />

            <br><br>

            <input type='submit' name='actualizar' value='Actualizar cambios' />

        </form>

        <br />
        <a href='CategoriasDestroy.php?id=<?=$id?>'>Eliminar categoría</a>

        <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

    </body>
</html>