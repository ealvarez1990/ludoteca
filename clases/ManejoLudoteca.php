<?php

class ManejoLudoteca {

    private $bd = NULL;
    private $tabla = 'ludoteca';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Ludoteca $ludoteca) {
        //return $this->bd->update($this->tabla, $city->get());
        $paramsWhere = array();
        $paramsWhere["id"] = $ludoteca->getDni();
        return $this->bd->update($this->tabla, $ludoteca->get(), $paramsWhere);
    }

    function insert(Ludoteca $ludoteca) {
        return $this->bd->insert($this->tabla, $ludoteca->get());
    }

    function delete($id) {
        $parametros = array();
        $parametros['id'] = $id;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getId() {
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, '*', 'id=:id', $parametros);
        $fila = $this->bd->getRow();
        $ludoteca = new Ludoteca();
        $ludoteca->set($fila);
        return $ludoteca;
    }

    function get($id) {
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, '*', 'id=:id', $parametros);
        $fila = $this->bd->getRow();
        $ludoteca = new Ludoteca();
        $ludoteca->set($fila);
        return $ludoteca;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP) {
        $ordenPredeterminado = "$orden, nombre, editorial, id";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "nombre, editorial, id";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $ludoteca = new Ludoteca();
            $ludoteca->set($fila);
            $r[] = $ludoteca;
        }
        return $r; //Devuelve un array de usuarios;
    }

    function paginacion() {
        $sql = "select count from $this->bd";
    }

    function count($condicion = "1=1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
     function getValuesSelect() {
        $this->bd->query($this->tabla, "id, nombre ", array(), "id");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
