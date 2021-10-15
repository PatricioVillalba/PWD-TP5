<?php
include_once("../../configuracion.php");

$session = new Session();
$roles = $session->getListaRoles();
$idRol = [];
if (isset($roles)) {
    foreach ($roles as $rol) {
        array_push($idRol, $rol->getIdrol());
    }
}
?>

<header>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="#">Grupo 9</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample06">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../usuario/listaUsuario.php">Ver Listado Usuarios</a>
                    </li>
                    <?php
                    if (in_array("1", $idRol)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../roles/listaRol.php">Roles</a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="d-flex justify-content-end w-75">
                    <?php if (!isset($_SESSION['activa'])) { ?>
                        <a class=" btn btn-primary" href="../Login/login.php">Login</a>
                    <?php } else { ?>
                        <a class="nav-link disabled" href="#"><?= $_SESSION['usnombre'] ?> </a>
                        <a class=" btn btn-danger" href="../accion/accionLogout.php">Cerrar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
    
    </nav> -->
</header>
<div style="height: 85vh;">
    <div class="w-100 h-100 d-inline-block">