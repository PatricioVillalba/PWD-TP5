<?php
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
$datos = data_submitted();
$objSession = new Session();
$abmUsuario = new AbmUsuario();
$usuarios = $abmUsuario->buscar(["usnombre" => $datos['usNombre']]);

$nombre = false;
if (count($usuarios) > 0) {
    $nombre = true;
}

$contraseña = false;
foreach ($usuarios as $usuario) {
    if ($usuario->getUspass() == $datos['usPass']) {
        $contraseña = true;
    }
}

?>

<?php
if ($objSession->iniciar($datos['usNombre'], $datos['usPass'])) {

    header('location:../usuario/paginaSegura.php');
    exit();
} else {
    if (!$contraseña && $nombre) {
        echo "Contraseña incorrecta<br>";
    } else {
        echo "Nombre incorrecto<br>";
    }
    echo "<a class='btn btn-primary' href='../login/login.php'>Volver a Intentar</a>";
}
?>
<a href="../ejercicios/paginaSegura.php"><button type="button" class="btn btn-outline-primary mt-3">Volver</button></a>
<?php
include_once("../estructura/pie.php");
?>