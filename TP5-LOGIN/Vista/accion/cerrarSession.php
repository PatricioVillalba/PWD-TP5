<?php
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
session_start();
// session_unset();
session_destroy();
if (isset($_SESSION)) {
    echo 'en el if';
    echo (session_status());
}
// $objSess = new Session();

// if ($objSess->cerrar()) {
//     header('location:../login/login.php');
//     exit();
// } else {
//     echo "Hubo un error al cerrar la sesion";
// }
include_once("../estructura/pie.php");
