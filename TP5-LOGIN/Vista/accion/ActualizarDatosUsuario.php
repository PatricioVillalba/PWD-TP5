<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$objAbmUsuarioRol = new AbmUsuarioRol();
$rolesTodos = $objAbmUsuarioRol->buscar(null);
if ($datos['accion'] == 'editar') {
    if ($objAbmUsuario->modificacion($datos)) {
        $resp = true;
    }
    foreach ($rolesTodos as $roles) {
        $datos['idrol'] = $roles->getIdrol();
        if ($objAbmUsuarioRol->baja($datos)) {
            $resp = true;
        }
    }
    foreach ($datos['roles'] as $roles) {
        $datos['idrol'] = $roles;
        if ($objAbmUsuarioRol->alta($datos)) {
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
<h3>Usuario</h3>
<h4><?php echo $mensaje; ?></h4>
<a class="btn btn-primary" href="../usuario/listaUsuario.php">Volver a la Lista</a>

<?php
include_once("../estructura/pie.php");
?>