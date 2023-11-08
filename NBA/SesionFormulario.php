<?php
require_once "_Varios.php";
require_once "_Sesion.php";

entrarSiSesionIniciada();
?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php if (isset($_REQUEST["error"])) { ?>
            <p class="mensaje-error">Error de autenticación, inténtelo de nuevo.</p>
        <?php } ?>
        <?php if (isset($_REQUEST["sesionCerrada"])) { ?>
            <p class="mensaje-exito">Se ha cerrado correctamente la sesión.</p>
        <?php } ?>

        <div class="form-group">
            <form action='SesionComprobar.php' method='post'>
                <label for='nombreUsuario'>Nombre de usuario</label><br>
                <input type='text' name='nombreUsuario'><br><br>
                <label for='contrasenna'>Contraseña</label><br>
                <input type='password' name='contrasenna'><br><br>
                <input type='checkbox' name='recuerdame'>Recuérdame<br><br>
                <input type='submit' value='Iniciar sesión'>
                <input type="submit" value="Crear Usuario" formaction="SesionCreate.php">
            </form>
        </div>
    </body>
</html>