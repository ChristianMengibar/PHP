<?php

$mensaje = "";

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Crear Categoría</title>

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
            <h1>Crear Categoría</h1>
            <form method="get" action="400-CategoriasStore.php">
                <label for="nombre">Nombre de la Categoría:</label>
                <input type="text" id="nombre" name="nombre" required>
                <button type="submit">Crear Categoria</button>
            </form>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        </body>
    </html>
</html>