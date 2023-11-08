<?php
?>

<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

    <body>
        <h1>Registro de Usuario</h1>

        <form method='post' action='SesionStore.php'>
            <div class="form-group">
                <label for='identificador'>Nombre de Usuario</label>
                <input type='text' id='identificador' name='identificador' />
            </div>

            <div class="form-group">
                <label for='contrasenna'>Contraseña</label>
                <input type='password' id='contrasenna' name='contrasenna' />
            </div>

            <div class="form-group">
                <label for='tipoUsuario'>Tipo de Usuario</label>
                <select id='tipoUsuario' name='tipoUsuario' class="custom-select">
                    <option value='1'>Tipo 1</option>
                    <option value='2'>Tipo 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for='nombre'>Nombre</label>
                <input type='text' id='nombre' name='nombre' />
            </div>

            <div class="form-group">
                <label for='apellidos'>Apellidos</label>
                <input type='text' id='apellidos' name='apellidos' />
            </div>

            <div class="form-group">
                <input type='submit' name='registrar' value='Registrar Usuario' />
            </div>
        </form>

        <p>
            <a href='SesionFormulario.php'>Volver al inicio de sesión</a>
        </p>
    </body>
</html>