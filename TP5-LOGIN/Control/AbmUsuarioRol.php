<?php
class AbmUsuarioRol
{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    public function cargarObjeto($param)
    {
        $usuarioRol = null;
        if (isset($param['idrol']) && isset($param['idusuario'])) {
            $usuarioRol = new UsuarioRol();
            $usuarioRol->setear($param['idusuario'], $param['idrol']);
        }

        return $usuarioRol;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    public function cargarObjetoConClave($param)
    {
        $objUsuarioRol = null;
        if (isset($param['idusuario']) && isset($param['idrol'])) {
            $objUsuarioRol = new UsuarioRol();
            $objUsuarioRol->setear($param['idusuario'], $param['idrol']);
        }
        return $objUsuarioRol;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {

        $resp = false;
        if (isset($param['idusuario']) && isset($param['idrol']));

        $resp = true;
        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $objUsuarioRol = $this->cargarObjeto($param);
        if ($objUsuarioRol != null and $objUsuarioRol->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */

    public function baja($param)
    {
        // verEstructura($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {

            $objUsuarioRol = $this->cargarObjeto($param);

            if ($objUsuarioRol != null and $objUsuarioRol->eliminar()) {

                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        //print_R($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {

            $objUsuarioRol = $this->cargarObjeto($param);

            if ($objUsuarioRol != null and $objUsuarioRol->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }


    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */

    public function buscar($param)
    {

        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario']))
                $where .= " and idusuario='" . $param['idusuario'] . "'";
            if (isset($param['idrol']))
                $where .= " and idrol ='" . $param['idrol'] . "'";
        }

        $arreglo = UsuarioRol::listar($where, "");
        return $arreglo;
    }
}
