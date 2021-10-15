<?php
class Session
{
    private $objUsuario;
    private $listaRoles;
    private $mensajeoperacion;
    private $error;

    public function __construct()
    {
        // PHP_SESSION_NONE si las sesiones están habilitadas, pero no existe ninguna.
        // _DISABLED = 0
        // _NONE = 1
        // _ACTIVE = 2
        if (session_status() === 1) {
            session_start();
            $this->objUsuario = null;
            $this->listaRoles = null;
        } else {
            $this->error = 'vacio';
        }
    }

    // public function iniciar($nombreUsuario, $psw)
    // {
    //     $_SESSION['usnombre'] = $nombreUsuario;
    //     $_SESSION['uspass'] = $psw;
    // }

    public function getError()
    {
        return $this->error;
    }

    public function setError($text)
    {
        $this->error = $text;
    }

    public function getObjUsuario()
    {
        if ($this->activa()) {
            $objUsuario = new Usuario();
            $objUsuario->setIdUsuario($_SESSION['idusuario']);
            $objUsuario->cargar();
        } else {
            $objUsuario = null;
        }

        $this->setObjUsuario($objUsuario);

        return $this->objUsuario;
    }

    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    public function getListaRoles()
    {
        if (isset($_SESSION['idusuario'])) {
            $arre['idusuario'] = $_SESSION['idusuario'];
            $AbmUsuario = new AbmUsuario();
            $usuario = $AbmUsuario->buscar($arre);

            $this->setListaRoles($usuario[0]->getColRoles());
        }
        return $this->listaRoles;
    }

    public function setListaRoles($listaRoles)
    {
        $this->listaRoles = $listaRoles;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    public function iniciar($usnombre, $uspass)
    {
        $retorna = null;

        if (isset($usnombre) and isset($uspass)) {
            $sesion = new Session();
            $_SESSION['usnombre'] = $usnombre;
            $_SESSION['uspass'] = md5($uspass);
            $retorna = $sesion->validar();
        }
        return $retorna;
    }

    public function validar()
    {
        $retorna = 0;

        $arreglo['usnombre'] = $_SESSION['usnombre'];

        $abmUsuario = new AbmUsuario();
        //busca usuario con ese nombre
        $colUsuarios = $abmUsuario->buscar($arreglo);

        if (count($colUsuarios) > 0) {
            $arreglo['uspass'] = $_SESSION['uspass'];

            //busca usuario con ese nombre y contraseña
            $colUsuarios = $abmUsuario->buscar($arreglo);
            if (count($colUsuarios) > 0) {
                if ($colUsuarios[0]->getDeshabilitado() == NULL || $colUsuarios[0]->getDeshabilitado() == "0000-00-00 00:00:00") {
                    $_SESSION['idusuario'] = $colUsuarios[0]->getIdUsuario();
                    $_SESSION['activa'] = true;
                    $retorna = 1;
                } else {
                    $retorna = 2; //('Usuario Deshabilitado');
                }
            } else {
                $retorna = 3; //('Contraseña incorrecta');
            }
        } else {
            $retorna = 4; //('Nombre incorrecto');
        }

        return $retorna;
    }


    // public function activa()
    // {
    //     $activa = false;
    //     if (session_start()) {
    //         $activa = true;
    //     }
    //     return $activa;
    // }

    public function activa()
    {
        $activa = false;
        if (isset($_SESSION['activa'])) {
            $activa = true;
        }
        return $activa;
    }

    // public function getUsuario()
    // {
    //     $abmUsuario = new AbmUsuario();
    //     $where = ['usnombre' => $_SESSION['usnombre'], 'idusuario' => $_SESSION['idusuario']];
    //     $listaUsuarios = $abmUsuario->buscar($where);
    //     if ($listaUsuarios >= 1) {
    //         $usuarioLog = $listaUsuarios[0];
    //     }
    //     return $usuarioLog;
    // }

    // public function getRol()
    // {
    //     $abmRol = new AbmRol();
    //     $abmUsuarioRol = new AbmUsuarioRol();
    //     $usuario = $this->getUsuario();
    //     $idUsuario = $usuario->getId();
    //     $param = ['idusuario' => $idUsuario];
    //     $listaRolesUsu = $abmUsuarioRol->buscar($param);
    //     if ($listaRolesUsu > 1) {
    //         $rol = $listaRolesUsu;
    //     } else {
    //         $rol = $listaRolesUsu[0];
    //     }
    //     return $rol;
    // }

    public function cerrar()
    {
        if (isset($_SESSION['activa'])) {
            session_unset();
            session_destroy();
            $this->objUsuario = null;
            $this->colRoles = null;
        }
    }
}
