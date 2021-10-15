<?php
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objRol = new AbmRol();
if (isset($datos['accion'])) {

    if ($datos['accion'] == 'borrar') {
        if ($objRol->baja($datos)) {
            $resp = true;
        }
    }
    if ($resp) {
        $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
    } else {
        $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
    }
}

?>
<h3>Borrar Rol</h3>
<?php
echo $mensaje;
?>
<br><a href="../Rol/listaRol.php">Ver lista Roles</a><br>
<?php
include_once("../estructura/pie.php");
?>