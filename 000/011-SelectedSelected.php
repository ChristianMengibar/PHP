<?php

$ciudades = [
    17 => "Donosti",
    8 => "Getafe",
    4 => "Toledo",
    71 => "Granada",
    52 => "Lugo",
    47 => "Zaragoza"
];

$ciudadSeleccionada = null;

?>

<html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select</title>
</head>
<body>

<select name="ciudad" id"">



<?php
if ($ciudadSeleccionada == null){
    echo "<option value='' disabled selected>----Elige una ciudad----</option>";
} else {
    echo "<option value='' disabled>----Elige una ciudad----</option>";

}

foreach ($ciudades as $id => $ciudad){
    if ($id == $ciudadSeleccionada){
        echo "<option value=$id selected> $ciudad </option>";
    } else {
        echo "<option value=$id> $ciudad </option>";
    }
}

?>

</select>

</body>
</html>
</html>