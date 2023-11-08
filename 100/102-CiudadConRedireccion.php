<?php
$mensError = "ERROR"
?>

<html>
<head>

</head>
<body>



    <p>Introduce tu ciudad favorita: </p>

    <form action="102-CiudadConRedireccion2.php" method="get">
        <input type="text" name="ciudad">
        <input type="submit" name="Enviar">
    </form>

    <?php
    if (isset($_GET['errorCiu'])) {
        echo "<p id='mensError'> $mensError </p>";
    }
    ?>

</body>
</html>