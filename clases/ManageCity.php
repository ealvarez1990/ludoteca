<?php

class ManageCity {

    private $bd = NULL;
    private $tabla = "city";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(City $city) {
        //return $this->bd->update($this->tabla, $city->get());
        $paramsWhere = array();
        $paramsWhere["ID"] = $city->getID();
        return $this->bd->update($this->tabla, $city->get(), $paramsWhere);
    }

    function insertCity(City $city) {
        return $this->bd->insert($this->tabla, $city->get());
    }

    function deleteCity($ID) {
        $parametros = array();
        $parametros['ID'] = $ID;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getId() {
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, '*', 'id=:ID', $parametros);
        $fila = $this->bd->getRow();
        $city = new City();
        $city->set($fila);
        return $city;
    }

    function get($ID) {
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, '*', "id=:ID", $parametros);
        $fila = $this->bd->getRow();
        $city = new City();
        $city->set($fila);
        return $city;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP, $condicion="1=1", $parametros=array()) {
        $ordenPredeterminado="$orden, Name, CountryCode, ID";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "Name, CountryCode, ID";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $city = new City();
            $city->set($fila);
            $r[] = $city;
        }
        return $r; //Devuelve un array de ciudades;
    }

    function paginacion() {
        $sql = "select count from $this->bd";
    }

    function count($condicion = "1=1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

}
