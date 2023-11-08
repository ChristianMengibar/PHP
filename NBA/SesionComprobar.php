<?php
require_once "_Varios.php";
require_once "_Sesion.php";

entrarSiSesionIniciada();

$nombreUsuario = $_POST["nombreUsuario"];
$contrasenna = $_POST["contrasenna"];

$usuario = obtenerUsuarioPorContrasenna($nombreUsuario, $contrasenna);

if ($usuario) {
    generarSesionRAM($usuario);

    if (isset($_REQUEST["recuerdame"])) {
        generarRenovarSesionCookie();
    }

    redireccionar("EquiposIndex.php");
} else {
    redireccionar("SesionFormulario.php?error");
}
?>