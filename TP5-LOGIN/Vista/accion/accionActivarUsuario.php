<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$objRol = new AbmRol();
$listaRoles = $objRol->buscar(null);
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$listaUsuario = $objAbmUsuario->buscar($datos);
$datos['idusuario'] = $listaUsuario[0]->getIdusuario();
$datos['usnombre'] = $listaUsuario[0]->getUsnombre();
$datos['uspass'] = $listaUsuario[0]->getUspass();
$datos['usmail'] = $listaUsuario[0]->geetUsmail();
$datos['usdeshabilitado'] = NULL;
$datos['accion'] = 'Reactivar Usuario';
$resp = false;

if ($objAbmUsuario->modificacion($datos)) {
    $resp = true;
}

if ($resp) {
    $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
} else {
    $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
}
?>
<div class="container">

    <div class="card text-center mt-4">
        <div class="card-header">
            <h3>Dar de Baja Usuario</h3>
        </div>
        <div class="card-body">
            <h4><?php echo $mensaje; ?></h4>
        </div>
        <div class="card-footer text-muted">
            <a class="btn btn-primary" href="../usuario/listaUsuario.php">Volver a la lista de Usuarios</a>
        </div>
    </div>

</div>
<?php
include_once("../estructura/pie.php");
?>