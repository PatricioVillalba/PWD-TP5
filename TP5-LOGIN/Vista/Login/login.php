<?php
include_once("../estructura/cabecera.php");
include_once '../estructura/menu.php';
include_once("../../configuracion.php");

$datos = data_submitted();
$session = new Session();
// exit;
?>
<div class="container">



    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Inicio Sesion</h5>
                    <form action="../accion/accionLogin.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="usnombre" name="usnombre" placeholder="Tu Nombre">
                            <label for="floatingInput">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="uspass" name="uspass" placeholder="Password">
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <small> Nombre:admin Contraseña=123</small>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Ingresar</button>
                        </div>
                        <!-- <div class="alert alert-danger mt-3" role="alert">
                                    Contraseña o Nombre incorrecto
                                </div> -->
                        <?php
                        if (isset($datos['error'])) {
                            switch ($datos['error']) {
                                case 4:
                                    echo ('<div class="alert alert-danger mt-3" role="alert">
                                            Nombre incorrecto
                                            </div>');
                                    break;
                                case 3:
                                    echo ('<div class="alert alert-danger mt-3" role="alert">
                                           Contraseña incorrecta 
                                        </div>');
                                    break;
                                case 2:
                                    echo ('<div class="alert alert-danger mt-3" role="alert">
                                         Usuario Deshabilitado 
                                        </div>');
                                    break;
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../estructura/pie.php");
?>