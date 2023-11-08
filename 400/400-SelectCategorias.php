<?php

$servidor = "localhost";
$nombreUsuario = "root";
$passw = "";
$baseDatos = "agenda";

$conexion = new mysqli($servidor, $nombreUsuario, $passw, $baseDatos);

if ($conexion->connect_error) {
    die("ERROR: " . $conexion->connect_error);
}

$sql = "SELECT id, nombre FROM categoria";
$resultado = $conexion->query($sql);

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
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>

            <?php

            if ($resultado->num_rows > 0) {

                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td><a href='400-CategoriasShow.php?id=" . $row["id"] . "'>" . $row["nombre"] . "</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No se encontraron categorías.";
            }

            $conexion->close();
            ?>

            </table>

            <br>

            <a href="400-CategoriasIndex.php">Volver a la lista de categorías</a>

        </body>
    </html>
</html>