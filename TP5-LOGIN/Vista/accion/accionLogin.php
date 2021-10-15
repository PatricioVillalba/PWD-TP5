<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
$datos = data_submitted();
$session = new Session();
$valor = $session->iniciar($datos['usnombre'], $datos['uspass']);


if ($session != null) {
    if ($session->getObjUsuario()) {

        if ($session->activa() && $valor = 1) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/TP5-LOGIN/Vista/Login/paginaSegura.php");
        } else {
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/TP5-LOGIN/Vista/Login/login.php");
        }
    } else {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/TP5-LOGIN/Vista/Login/login.php" . "?error=" . $valor);
    }
}
?>
<?php
include_once("../estructura/pie.php");
?>