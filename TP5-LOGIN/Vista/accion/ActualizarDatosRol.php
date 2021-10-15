<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
$datos = data_submitted();
$objAbmRol = new AbmRol();
if ($datos['accion'] == 'editar') {
    if ($objAbmRol->modificacion($datos)) {
        $resp = true;
    }
}
if ($resp) {
    $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
} else {
    $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
}
?>
<h3>Rol</h3>
<h4><?php echo $mensaje; ?></h4>
<a href="../rol/listaRol.php">Lista</a>

<?php
include_once("../estructura/pie.php");
?>