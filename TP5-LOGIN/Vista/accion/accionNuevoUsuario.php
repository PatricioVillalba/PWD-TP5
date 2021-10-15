<?php

include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$objAbmUsuarioRol = new AbmUsuarioRol();

$respuesta = "";
// print_r($datos);
// exit;
if ($datos['accion'] == 'nuevo') {

    if ($objAbmUsuario->alta($datos)) {
        $resp = true;
    }
    $elObjUsuario = $objAbmUsuario->buscar($datos);
    $datos['idusuario'] = $elObjUsuario[0]->getIdUsuario();
    // exit;

    foreach ($datos['roles'] as $roles) {
        $datos['idrol'] = $roles;
        if ($objAbmUsuarioRol->alta($datos)) {
            $resp = true;
        }
    }

    if ($resp) {
        $respuesta .= "La accion " . $datos['accion'] . " se realizo correctamente.";
    } else {
        $respuesta .= "La accion " . $datos['accion'] . " no pudo concretarse.";
    }
}

?>
<h3>Usuarios</h3>
<h4><?php echo $respuesta ?></h4>
<a class="btn btn-primary" href="../usuario/listaUsuario.php">Lista</a>
<?php
include_once("../estructura/pie.php");
?>