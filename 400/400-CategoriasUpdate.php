<?php

require_once "_Varios.php";
$conexion = obtenerPdoConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nuevoNombre = $_POST["nombre"];

    $sql = $conexion->prepare("UPDATE categoria SET nombre = ? WHERE id = ?");
    $actualizado = $sql->execute([$nuevoNombre, $id]);

    if ($actualizado) {
        header("Location: 400-CategoriasIndex.php?mostrarMensaje=true");
        exit();
    }
} else {
    header("Location: 400-CategoriasIndex.php");
    exit();
}

?>

<!DOCTYPE html>
    <html>
        <head>
                <meta charset="UTF-8">
                <title>Actualizar Categoría</title>
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
            <h1>Actualizar Categoría</h1>
            <br>
            <a href="400-CategoriasIndex.php">Volver a la lista de categorías</a>
            <br>
        </body>
    </html>
</html>