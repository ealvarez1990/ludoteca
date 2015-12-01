<?php

class ManageCountry {

    private $bd = NULL;
    private $tabla = "country";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function erase(Country $country) {
        $parametros = array();
        $parametros['Code'] = $country->getCode();
        return $this->bd->delete($this->tabla, $parametros);
    }

    function delete($Code) {
        $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function forzardelete($Code) {
        $parametros = array();
        $parametros['CountryCode'] = $Code;
        $gestor = new ManageCity($this->bd);
        $gestor->deleteCity($parametros);
        $this->bd->delete("countryLanguage", $parametros);
        $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function set(Country $country, $pkCode) {
        $parametros = $country->getArray();
        $parametrosWhere = array();
        $parametrosWhere["Code"] = $pkCode;
        $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }

    function insert(Country $country) {
        $parametros = $country->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "Code,Name", array(), "Name");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

    function getList($nrpp= Configuracion::NRPP) {
        $this->bd->select($this->tabla, "*", "1=1", array(), "Name","0, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $city = new Country();
            $city->set($fila);
            $r[] = $city;
        }
        return $r; //Devuelve un array de ciudades;
    }

    function get($Code) {
        $parametros = array();
        $parametros['Code'] = $Code;
        $this->bd->select($this->tabla, '*', "Code=:Code", $parametros);
        $fila = $this->bd->getRow();
        $country = new Country();
        $country->set($fila);
        return $country;
    }

}
