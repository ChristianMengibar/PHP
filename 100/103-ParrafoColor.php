<?php

$colores = [
    'orange' => "Naranja",
    'yellow' => "Amarillo",
    'green' => "Verde",
    'blue' => "Azul",
    'red' => "Rojo",
    'pink' => "Rosa"
];

?>

</head>
<body>

    <p>Selecciona tu color favorito: </p>

        <form action="103-ParrafoColor2.php" method="get">

            <select name="color" id="colores">

                <option value="a" selected disabled>Lista de colores</option>
                <?php

                foreach ($colores as $id => $color){
                        echo "<option value=$id> $color </option>";
                    }

                ?>
            </select>
            <input type="submit">
        </form>
</body>
</html>