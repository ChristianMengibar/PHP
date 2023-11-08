<?php
    $ciudad = $_REQUEST["ciudad"]
?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <p>La ciudad que has introducido es: <?=$ciudad?>.</p>

        <a href='https://www.google.com/search?q=<?=$ciudad?>'>Pincha aquí para buscar tu ciudad favorita.</a>
    </body>
</html>
