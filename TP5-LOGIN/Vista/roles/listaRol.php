<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
include_once '../estructura/menu.php';

$objRol = new AbmRol();
$listaRol = $objRol->buscar(null);

?>
<div class="container">

    <h3>Listado Roles</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id Rol</th>
                <th scope="col">Descripcion</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php
        if ($listaRol > 0) {
            foreach ($listaRol as $objRol) {
                echo '<tr>';
                echo '<td ">' . $objRol->getIdRol() . '</td>';
                echo '<td ">' . $objRol->getRodescripcion() . '</td>';
                echo '<td><a href="../rol/editarRol.php?accion=editar&idrol=' . $objRol->getIdRol() . '"">
            <button type="button" class="btn btn-primary" disabled><i class="fas fa-pen" aria-hidden="true"></i></button>
            </a></td>';
                echo '<td><a href="../accion/eliminarRol.php?accion=borrar&idrol=' . $objRol->getIdrol() . '">
            <button type="button" class="btn btn-danger" disabled><i class="fa fa-trash" aria-hidden="true"></i></button>
            </a></td>';
                echo '</tr>';
            }
        } else {
            echo '<h4>Aun no hay Usuarios cargados en la base</h4>';
        }
        ?>
        <!-- <a class="btn btn-success" href="../rol/NuevoRol.php">crear Rol</a> -->
        </li>

    </table>
</div>
<?php
include_once("../estructura/pie.php");
?>