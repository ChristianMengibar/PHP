<?php
require_once "_Varios.php";

$id = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlPersona = "SELECT * FROM persona WHERE id=?";
$select = $conexion->prepare($sqlPersona);
$select->execute([$id]);
$fila = $select->fetch();

$nombre = $fila["nombre"];
$apellidos = $fila["apellidos"];
$telefono = $fila["telefono"];
$estrella = $fila["estrella"];
$categoriaId = $fila["categoriaId"];
?>

<html>

    <head>
        <meta charset='UTF-8'>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1 {
                text-align: center;
            }

            form {
                width: 50%;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }

            input[type="text"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
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

            a {
                display: block;
                text-align: center;
                margin: 20px auto;
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                color: #0056b3;
            }
        </style>
    </head>

    <body>

        <h1>Editar persona</h1>

        <form method='get' action='PersonasUpdate.php'>

            <input type='hidden' name='id' value='<?=$id?>' />

            <label for='nombre'>Nombre</label>
            <input type='text' id='nombre' name='nombre' value='<?=$nombre?>' />

            <br><br>

            <label for='apellidos'>Apellidos</label>
            <input type='text' id='apellidos' name='apellidos' value='<?=$apellidos?>' />

            <br><br>

            <label for='telefono'>Teléfono</label>
            <input type='text' id='telefono' name='telefono' value='<?=$telefono?>' />

            <br><br>

            <label for='estrella'>Estrella</label>
            <input type='checkbox' id='estrella' name='estrella' <?=$estrella ? 'checked' : ''?> />

            <br><br>

            <label for='categoriaId'>Categoría</label>
            <select id='categoriaId' name='categoriaId'>
                <?php
                $sqlCategorias = "SELECT id, nombre FROM categoria";
                $categorias = $conexion->query($sqlCategorias);
                while ($categoria = $categorias->fetch()) {
                    $selected = ($categoria["id"] == $categoriaId) ? "selected" : "";
                    echo "<option value='{$categoria["id"]}' $selected>{$categoria["nombre"]}</option>";
                }
                ?>
            </select>

            <input type='submit' name='actualizar' value='Actualizar cambios' />

        </form>

        <a href='PersonasIndex.php'>Volver al listado de personas</a>

    </body>
</html>