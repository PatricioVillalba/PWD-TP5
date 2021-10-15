<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$datos = data_submitted();
$objAbmAbmUsuario = new AbmUsuario();
$objRol = new AbmRol();
$RolesTodos = $objRol->buscar(null); // todos los roles para mostrar en formulario
$listaUsuario = $objAbmAbmUsuario->buscar($datos);

$permisos = [];
//en permisos gurda todos los idRol de los roles que tiene ese usuario
foreach ($listaUsuario[0]->getColRoles() as $rol) {
    array_push($permisos, $rol->getIdRol());
}

if (count($listaUsuario) == 1) {
    $unUsuario = $listaUsuario[0];
}
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3>
                Editar Usuario
            </h3>
        </div>
        <div class="card-body">
            <form method="post" action="../accion/ActualizarDatosUsuario.php">
                <div class="form-group mb-2">
                    <label class="form-label" for="idusuario">Id Usuario</label>
                    <input class="form-control" id="idusuario" readonly name="idusuario" width="80" type="text" value="<?php echo $unUsuario->getIdusuario() ?>">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="usnombre">Nombre</label>
                    <input class="form-control" id="usnombre" name="usnombre" value="<?php echo $unUsuario->getUsnombre() ?>">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="uspass">Contraseña</label>
                    <input class="form-control" id="uspass" name="uspass" type="text" value="<?php echo $unUsuario->getUspass() ?>">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="usmail">Mail</label>
                    <input class="form-control" id="usmail" name="usmail" type="email" value="<?php echo $unUsuario->geetUsmail() ?>">
                </div>
                <label class="form-label" for="">Roles</label>
                <?php
                foreach ($RolesTodos as $rol) {
                    if (in_array($rol->getIdrol(), $permisos)) {
                        echo ('
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $rol->getIdrol() . '" name="roles[' . $rol->getRodescripcion() . ']" id="' . $rol->getRodescripcion() . '" checked>
                    <label class="form-check-label" for="">
                    ' . $rol->getRodescripcion() . '
                    </label>
                    </div>
                    ');
                    } else {
                        echo ('
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $rol->getIdrol() . '" name="roles[' . $rol->getRodescripcion() . ']" id="' . $rol->getRodescripcion() . '" >
                    <label class="form-check-label" for="">
                    ' . $rol->getRodescripcion() . '
                    </label>
                    </div>
                    ');
                    }
                }
                ?>
                <div class="form-group mb-2">
                    <input class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="<?php echo $unUsuario->getDeshabilitado() ?>" type="hidden">
                    <input class="form-control" id="accion" name="accion" value="editar" type="hidden">
                    <input type="submit" class="btn btn-primary" value="Editar">
                </div>
            </form>
        </div>
    </div>
    <?php
    include_once("../estructura/pie.php");
    ?>