<?php
require_once "_Varios.php";

$categoriaId = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlCategoria = "SELECT * FROM categoria WHERE id=?";
$select = $conexion->prepare($sqlCategoria);
$select->execute([$categoriaId]);
$fila = $select->fetch();

$categoriaNombre = $fila["nombre"];
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

            p {
                text-align: center;
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

        <h1>Ver categoría</h1>

        <p>Nombre: <?=$categoriaNombre?></p>

        <a href='CategoriasEdit.php?id=<?=$categoriaId?>'>Editar categoría</a>

        <a href='CategoriasDestroy.php?id=<?=$categoriaId?>'>Eliminar categoría</a>

        <a href='CategoriasIndex.php'>Volver al listado de categorías.</a>

    </body>
</html>