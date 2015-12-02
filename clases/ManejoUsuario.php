<?php

class ManejoUsuario {

    private $bd = NULL;
    private $tabla = 'usuario';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Usuario $usuario) {
        //return $this->bd->update($this->tabla, $city->get());
        $paramsWhere = array();
        $paramsWhere["dni"] = $usuario->getDni();
        return $this->bd->update($this->tabla, $usuario->get(), $paramsWhere);
    }

    function insert(Usuario $usuario) {
        return $this->bd->insert($this->tabla, $usuario->get());
    }

    function delete($dni) {
        $parametros = array();
        $parametros['dni'] = $dni;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getDni() {
        $parametros = array();
        $parametros['dni'] = $dni;
        $this->bd->select($this->tabla, '*', 'dni=:dni', $parametros);
        $fila = $this->bd->getRow();
        $usuario = new Usuario();
        $usuario->set($fila);
        return $usuario;
    }

    function get($dni) {
        $parametros = array();
        $parametros['dni'] = $dni;
        $this->bd->select($this->tabla, '*', 'dni=:dni', $parametros);
        $fila = $this->bd->getRow();
        $usuario = new Usuario();
        $usuario->set($fila);
        return $usuario;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP, $condicion = "1=1", $parametros = array()) {
        $ordenPredeterminado = "$orden, dni, nombre, idhabitacion";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "dni, nombre, idhabitacion";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $usuario = new Usuario();
            $usuario->set($fila);
            $r[] = $usuario;
        }
        return $r; //Devuelve un array de ciudades;
    }

    function paginacion() {
        $sql = "select count from $this->bd";
    }

    function count($condicion = "1=1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "dni, nombre ", array(), "dni");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
}
