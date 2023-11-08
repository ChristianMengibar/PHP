<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

$nombre = $_GET["nombre"];

$sql = $conexion ->prepare("INSERT INTO categoria (nombre) VALUES (?)");
$creado = $sql -> execute([$nombre]);

if ($creado) {

    header("Location: 400-CategoriasIndex.php");
    exit;
}

$mensaje = "";

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Almacenar Categoría</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                h1 {
                    color: #333;
                }

                form {
                    width: 30%;
                }

                input[type="text"] {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                }

                button[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <h1>Almacenar Categoría</h1>
            <form method="post" action="400-CategoriasStore.php">
                <label for="nombreCategoria">Nombre de la Categoría:</label>
                <input type="text" id="nombre" name="nombreCategoria" required>
                <button type="submit">Almacenar Categoría</button>
            </form>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        </body>
    </html>
</html>
