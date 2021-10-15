<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
$session = new Session();
$roles = $session->getListaRoles();
?>
<div class="mx-auto container text-center p-5">

    <h1>Bienvenido <?= $_SESSION['usnombre'] ?></h1>

</div>

<?php
include_once("../estructura/pie.php");
?>