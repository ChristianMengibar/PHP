<?php
require_once "_Varios.php";

$personaId = (int)$_REQUEST["id"];

$conexion = obtenerPdoConexionBD();
$sqlPersona = "SELECT p.*, c.nombre as categoria_nombre
               FROM persona p
               JOIN categoria c ON p.categoriaId = c.id
               WHERE p.id = ?";
$select = $conexion->prepare($sqlPersona);
$select->execute([$personaId]);
$fila = $select->fetch();

$nombre = $fila["nombre"];
$apellidos = $fila["apellidos"];
$telefono = $fila["telefono"];
$categoriaNombre = $fila["categoria_nombre"];
$estrella = $fila["estrella"];
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

            p {
                margin-bottom: 10px;
            }

            a {
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>

        <h1>Ver persona</h1>

        <p>Nombre: <?=$nombre?></p>
        <p>Apellidos: <?=$apellidos?></p>
        <p>Teléfono: <?=$telefono?></p>
        <p>Categoría: <?=$categoriaNombre?></p>
        <p>Estrella: <?=$estrella ? 'Sí' : 'No'?></p>

        <br/>

        <a href='PersonasEdit.php?id=<?=$personaId?>'>Editar persona</a>
        <br/>
        <br/>
        <a href='PersonasDestroy.php?id=<?=$personaId?>'>Eliminar persona</a>
        <br/>
        <br/>

        <a href='PersonasIndex.php'>Volver al listado de personas.</a>

    </body>

</html>