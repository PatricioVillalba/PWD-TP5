<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$objRol = new AbmRol();
$RolesTodos = $objRol->buscar(null); // todos los roles para mostrar en formulario

?>

<div class="container mt-3">
    <form method="post" action="../accion/accionNuevoUsuario.php">

        <div class="form-group mb-2">
            <label class="form-label" for="usnombre">Nombre</label>
            <input class="form-control" id="usnombre" name="usnombre" value="">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="uspass">Contraseña</label>
            <input class="form-control" id="uspass" name="uspass" type="text" value="">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="usmail">Mail</label>
            <input class="form-control" id="usmail" name="usmail" type="email" value="">
        </div>
        <label class="form-label" for="">Roles</label>
        <?php
        foreach ($RolesTodos as $rol) {
            echo ('
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $rol->getIdrol() . '" name="roles[' . $rol->getRodescripcion() . ']" id="' . $rol->getRodescripcion() . '" >
                    <label class="form-check-label" for="">
                    ' . $rol->getRodescripcion() . '
                    </label>
                    </div>
                    ');
        }
        ?>
        <div class="form-group mb-2">
            <input class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="NULL" type="hidden">
            <input class="form-control" id="accion" name="accion" value="nuevo" type="hidden">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
</div>
<?php
include_once("../estructura/pie.php");
?>