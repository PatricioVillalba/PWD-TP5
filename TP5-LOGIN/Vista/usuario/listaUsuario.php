<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
include_once '../estructura/menu.php';

$objUsuario = new AbmUsuario();
$objUsuarioRol = new AbmUsuarioRol();
$objRol = new AbmRol();
$listaUsuarios = $objUsuario->buscar(null);
$session = new Session();
$roles = $session->getListaRoles();

//para manejar permisos de usuario
$idRol = [];
if (isset($roles)) {
    foreach ($roles as $rol) {
        array_push($idRol, $rol->getIdrol());
    }
}
?>
<div class="container">
    <h3>Listado Usuarios</h3>
    <?php
    if (in_array("1", $idRol)) {
        echo ('<a class="btn btn-success" href="crearUsuario.php">Crear Nuevo</a>');
    } ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Mail</th>
                <th scope="col">Permisos</th>
                <?php if (in_array("1", $idRol)) {
                    echo '<th scope="col"></th>';
                    echo '<th scope="col"></th>';
                }
                ?>
            </tr>
        </thead>
        <?php
        if (count($listaUsuarios) > 0) {
            foreach ($listaUsuarios as $objUsuario) {
                if ($objUsuario->getDeshabilitado() == NULL || $objUsuario->getDeshabilitado() == "0000-00-00 00:00:00") {
                    echo '<tr>';
                } else {
                    echo '<tr class="table-danger">';
                }
                echo '<td ">' . $objUsuario->getUsnombre() . '</td>';
                echo '<td ">' . $objUsuario->getUspass() . '</td>';
                echo '<td ">' . $objUsuario->geetUsmail() . '</td>';
                echo ('<td>');
                foreach ($objUsuario->getColRoles() as $rol) {
                    $param['idrol'] = $rol->getidRol();
                    $nombre = $objRol->buscar($param);
                    echo ('<span class="badge bg-primary ms-1">' . $nombre[0]->getRodescripcion()  . '</span>');
                }
                echo ('</td>');
                //echo '<td><a href="../accion/autosPersona.php?DniDuenio=' . $objUsuario->getNroDni() . '">Mostrar Lista de auto</a></td>';
                if (in_array("1", $idRol)) {
                    echo '<td><a href="../usuario/editarUsuario.php?idusuario=' . $objUsuario->getIdusuario() . '"">
                    <button type="button" class="btn btn-primary"><i class="fas fa-pen" aria-hidden="true"></i></button></a></td>';
                    if ($objUsuario->getDeshabilitado() == NULL || $objUsuario->getDeshabilitado() == "0000-00-00 00:00:00") {
                        echo '<td><a href="../accion/accionBorrarUsuario.php?idusuario=' . $objUsuario->getIdusuario() . '">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </a></td>';
                    } else {
                        echo '<td><a href="../accion/accionActivarUsuario.php?idusuario=' . $objUsuario->getIdusuario() . '">
                    <button type="button" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </a></td>';
                    }
                    echo '</tr>';
                }

                // print_r($objUsuario->getColRoles()[0]->getIdusuario());
                // exit;
            }
        } else {
            echo '<h4>Aun no hay Usuarios cargados en la base</h4>';
        }
        ?>
    </table>
</div>
<?php
include_once("../estructura/pie.php");
?>