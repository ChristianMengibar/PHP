<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$sql = $conexion ->prepare("SELECT * FROM categoria");
$sql -> execute([]);
$resultado = $sql->fetchAll();

$mensaje = "Categoría creada con éxito.";

$mostrarMensaje = isset($_GET["mostrarMensaje"])

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Lista de Categorías</title>

            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                h1 {
                    color: #333;
                }

                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }
            </style>
        </head>

        <body>
            <h1>Lista de Categorías</h1>

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>

                <?php

                foreach($resultado as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td><a href='400-CategoriasShow.php?id=" . $row["id"] . "'>Ver</a></td>";
                        echo "<td><a href='400-CategoriasEdit.php?id=" . $row["id"] . "'>Editar</a></td>";
                        echo "<td><a href='400-ConfirmarEliminacion.php?id=" . $row["id"] . "'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                ?>

            </table>
            <br>

            <?php
            if ($mostrarMensaje){
                echo "Categoria Creada.";
            }
            ?>

            <a href="400-CategoriasCreate.php">Crear categoria</a>
        </body>
    </html>
</html>