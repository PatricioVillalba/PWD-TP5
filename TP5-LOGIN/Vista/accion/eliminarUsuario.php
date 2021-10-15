<?php
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objTrans = new AbmUsuario();
if (isset($datos['accion'])) {
    if ($datos['accion'] == 'borrar') {
        if ($objTrans->baja($datos)) {
            $resp = true;
        }
    }

    if ($resp) {
        $mensaje = "<h4>La accion " . $datos['accion'] . " se realizo correctamente.</h4>";
    } else {
        $mensaje = "<h4>La accion " . $datos['accion'] . " no pudo concretarse.</h4>";
    }
}

?>
<h3>Borrar Dato Persona</h3>
<?php
echo $mensaje;
?>
<br><a href="../persona/listaPersona.php">Ver lista Persona</a><br>

<?php
include_once("../estructura/pie.php");
?>