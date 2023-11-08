<?php

?>

<html>
<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Calculadora</title>
        </head>
        <body>
            <h1>Calculadora</h1>
            <form action="110-CalculadoraResultado.php" method="post">
                <select name="operador">
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicacion">Multiplicaci&oacute;n</option>
                    <option value="division">Divisi&oacute;n</option>
                </select><br />
                Ingresa tu primer n&uacute;mero:<br />
                <input type="text" name="valor1"><br />
                Ingresa tu segundo valor:<br />
                <input type="text" name="valor2"><br>
                <input type="reset" value="Borrar">
                <input type="submit" value="Enviar">
            </form>
        </body>
    </html>
</html>