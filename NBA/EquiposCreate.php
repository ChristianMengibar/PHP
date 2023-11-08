<?php
?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

    <body>
        <h1>Nuevo Equipo</h1>

        <form method='post' action='EquiposStore.php'>
            <div class="form-group">
                <label for='nombre'>Nombre del Equipo</label>
                <input type='text' id='nombre' name='nombre' />
            </div>

            <div class="form-group">
                <label for='conferencia'>Conferencia</label>
                <input type='text' id='conferencia' name='conferencia' />
            </div>

            <div class="form-group">
                <input type='submit' name='crear' value='Guardar Equipo' />
            </div>

        </form>
        <p>
            <a href='EquiposIndex.php'>Volver al listado de Equipos</a>
        </p>
    </body>
</html>