<?php

?>

<html>

    <head>
        <meta charset='UTF-8'>

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }

            h1 {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"], input[type="checkbox"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
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

            p.error {
                color: red;
            }
        </style>
    </head>

    <body>

        <h1>Nueva Persona</h1>

        <form method='get' action='PersonasStore.php'>

            <label for='nombre'>Nombre</label>
            <input type='text' id='nombre' name='nombre' required />

            <br><br>

            <label for='apellidos'>Apellidos</label>
            <input type='text' id='apellidos' name='apellidos' />

            <br><br>

            <label for='telefono'>Teléfono</label>
            <input type='text' id='telefono' name='telefono' required />

            <br><br>

            <label for='categoriaId'>Categoría</label>
            <input type='text' id='categoriaId' name='categoriaId' required />

            <br><br>

            <label for='estrella'>Estrella</label>
            <input type='text' id='estrella' name='estrella'/>

            <br><br>

            <input type='submit' name='crear' value='Crear Persona' />

        </form>

        <br>
        <a href='PersonasIndex.php'>Volver al listado de personas</a>

    </body>

</html>