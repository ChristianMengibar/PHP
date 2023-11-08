<?php
?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

    <body>
        <h1>Nuevo Jugador</h1>

        <form method='post' action='JugadoresStore.php'>
            <div class="form-group">
                <label for='nombre'>Nombre del Jugador</label>
                <input type='text' id='nombre' name='nombre' />
            </div>

            <div class="form-group">
                <label for='apellido'>Apellido del Jugador</label>
                <input type='text' id='apellido' name='apellido' />
            </div>

            <div class="form-group">
                <label for='posicion'>Posición del Jugador</label>
                <input type='text' id='posicion' name='posicion' />
            </div>

            <div class="form-group">
                <label for='equipo'>Equipo del Jugador</label>
                <input type='text' id='equipo' name='equipo' />
            </div>

            <div class="form-group">
                <label for='conferencia'>Conferencia del Jugador</label>
                <input type='text' id='conferencia' name='conferencia' />
            </div>

            <div class="form-group">
                <input type='submit' name='crear' value='Guardar Jugador' />
            </div>
        </form>
        <p>
            <a href='EquiposIndex.php'>Volver a Inicio</a>
        </p>
    </body>
</html>