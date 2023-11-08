<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();

$sql = "SELECT id, nombre FROM categoria ORDER BY nombre";

$sentencia = $conexion->prepare($sql);
$sentencia->execute([]);
$rs = $sentencia->fetchAll();
?>



<html>
    <head>
        <meta charset='UTF-8'>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1, p {
                text-align: center;
            }

            table {
                width: 50%;
                margin: 0 auto;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            a {
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                color: #0056b3;
            }
        </style>
    </head>

    <body>

        <h1>Listado de Categorías</h1>

        <table border='1'>

            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>

            <?php foreach ($rs as $fila) { ?>
                <tr>
                    <td><a href=   'CategoriasShow.php?id=<?=$fila["id"]?>'><?=$fila["nombre"]?></a></td>
                    <td><a href='CategoriasDestroy.php?id=<?=$fila["id"]?>'>(X)                 </a></td>
                </tr>
            <?php } ?>

        </table>

        <br>

        <p>
            <a href='CategoriasCreate.php'>Crear entrada</a>
        </p>

        <p>
            <a href='PersonasIndex.php'>Gestionar listado de Personas</a>
        </p>

    </body>
</html>