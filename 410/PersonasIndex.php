<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();

$sql = "SELECT p.*, c.nombre as categoria_nombre
        FROM persona p
        JOIN categoria c ON p.categoriaId = c.id
        ORDER BY p.apellidos, p.nombre";

$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$rs = $sentencia->fetchAll();
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

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            a {
                text-decoration: none;
                color: #007BFF;
            }

            a:hover {
                color: #0056b3;
            }

            .estrella {
                cursor: pointer;
                width: 20px;
                height: 20px;
                text-align: center;
            }

            .estrella-container {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>

        <script>
            function toggleEstrella(personaId) {
                // Realizar la lógica para cambiar el estado de la estrella aquí

                // Luego, redirigir a la página deseada
                window.location.href = 'PersonasPatchEstablecerEstrella.php?id=' + personaId;
            }
        </script>
    </head>

    <body>

        <h1>Listado de Personas</h1>

        <table border='1'>
            <tr>
                <th>Estrella</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Categoría</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            <?php foreach ($rs as $fila) { ?>
                <tr>
                    <td>
                        <div class="estrella-container">
                            <a href='PersonasPatchEstablecerEstrella.php?id=<?=$fila["id"]?>&estrella=<?=$fila["estrella"]?>'>
                                <?php if ($fila["estrella"]) { ?>
                                    <img class="estrella" src="imagenes/estrellaLlena.png" alt="Estrella llena">
                                <?php } else { ?>
                                    <img class="estrella" src="imagenes/estrellaVacia.png" alt="Estrella vacía">
                                <?php } ?>
                            </a>
                        </div>
                    </td>
                    <td><?=$fila["nombre"]?></td>
                    <td><?=$fila["apellidos"]?></td>
                    <td><?=$fila["categoria_nombre"]?></td>
                    <td><a href='PersonasShow.php?id=<?=$fila["id"]?>'>Ver</a></td>
                    <td><a href='PersonasEdit.php?id=<?=$fila["id"]?>'>Editar</a></td>
                    <td><a href='PersonasDestroy.php?id=<?=$fila["id"]?>'>Eliminar</a></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <a href="PersonasCreate.php">Crear nueva persona</a>
        <br>
        <br>
        <a href='CategoriasIndex.php'>Volver al listado de categorías</a>
    </body>
</html>