<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
$session = new Session();
$session->cerrar();
header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/TP5-LOGIN/Vista/Login/login.php");
?>


<?php
include_once("../estructura/pie.php");
?>