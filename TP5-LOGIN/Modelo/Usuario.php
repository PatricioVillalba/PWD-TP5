<?php

class Usuario
{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;
    private $mensajeoperacion;
    private $colRoles;

    public function __construct()
    {

        $this->idusuario = "";
        $this->usnombre = "";
        $this->uspass = "";
        $this->usmail = "";
        $this->usdeshabilitado = null;
        $this->mensajeoperacion = "";
        $this->colRoles = [];
    }

    /** --------------- */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function setIdusuario($valor)
    {
        $this->idusuario = $valor;
    }
    /** --------------- */
    public function getUsnombre()
    {
        return $this->usnombre;
    }
    public function setUsnombre($valor)
    {
        $this->usnombre = $valor;
    }
    /** --------------- */
    public function getUspass()
    {
        return $this->uspass;
    }
    public function setUspass($valor)
    {
        $this->uspass = $valor;
    }
    /** --------------- */
    public function geetUsmail()
    {
        return $this->usmail;
    }
    public function seetUsmail($valor)
    {
        $this->usmail = $valor;
    }
    /** --------------- */
    public function getDeshabilitado()
    {
        return $this->usdeshabilitado;
    }
    public function setDeshabilitado($valor)
    {
        $this->usdeshabilitado = $valor;
    }
    /** --------------- */
    public function getColRoles()
    {
        $condicionRol['idusuario'] = $this->getIdUsuario();
        $ambUsuarioRol = new AbmUsuarioRol();
        $colRolesUsuario = $ambUsuarioRol->buscar($condicionRol);

        $colRoles = [];
        foreach ($colRolesUsuario as $rolUsuario) {
            array_push($colRoles, $rolUsuario);
        }
        $this->setColRoles($colRoles);
        return $this->colRoles;
    }

    public function setColRoles($colRoles)
    {
        $this->colRoles = $colRoles;
    }
    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }


    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado)
    {
        $this->setIdusuario($idusuario);
        $this->setUsnombre($usnombre);
        $this->setUspass($uspass);
        $this->seetUsmail($usmail);
        $this->setDeshabilitado($usdeshabilitado);
    }



    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getIdusuario();
        if ($base->Iniciar()) {
            $resp = $base->Ejecutar($sql);
            if ($resp > -1) {
                if ($resp > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO usuario(usnombre,uspass,usmail,usdeshabilitado)  VALUES('" . $this->getUsnombre() . "','" . $this->getUspass() . "','" . $this->geetUsmail() . "','" . $this->getDeshabilitado() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: " . $base->getError()[2]);
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: " . $base->getError()[2]);
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE usuario SET usnombre='" . $this->getUsnombre() . "',uspass= md5('" . $this->getUspass() . "') ,usmail = '" . $this->geetUsmail() . "',usdeshabilitado = '" . $this->getDeshabilitado() . "' WHERE idusuario=" . $this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar 1: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar 2: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuario WHERE idusuario =" . $this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {

        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $resp = $base->Ejecutar($sql);
        if ($resp > -1) {
            if ($resp > 0) {


                while ($row = $base->Registro()) {

                    $obj = new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }

        return $arreglo;
    }

    public function modificarConParamatero($atributo, $valor, $id)
    {
        $resp = false;
        $base = new BaseDatos();
        // $sql = "UPDATE usuario SET".$atributo.'='" . $valor . "' WHERE idusuario=" . $this->getIdusuario();
        $sql = "UPDATE usuario SET" . $atributo . "=" . $valor . "WHERE idusuario=" . $id;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar 1: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar 2: " . $base->getError());
        }
        return $resp;
    }
}
