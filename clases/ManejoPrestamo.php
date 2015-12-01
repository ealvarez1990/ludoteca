<?php

class ManejoPrestamo {

    private $bd = NULL;
    private $tabla = 'prestamo';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Prestamo $prestamo) {
        $paramsWhere = array();
        $paramsWhere["idprestamo"] = $prestamo->getIdprestamo();
        return $this->bd->update($this->tabla, $prestamo->get(), $paramsWhere);
    }

    function insert(Prestamo $prestamo) {
        return $this->bd->insert($this->tabla, $prestamo->get());
    }

    function delete($idprestamo) {
        $parametros = array();
        $parametros['idprestamo'] = $idprestamo;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function getIdprestamo() {
        $parametros = array();
        $parametros['idprestamo'] = $idprestamo;
        $this->bd->select($this->tabla, '*', 'idprestamo=:idprestamo', $parametros);
        $fila = $this->bd->getRow();
        $prestamo = new Prestamo();
        $prestamo->set($fila);
        return $prestamo;
    }

    function get($idprestamo) {
        $parametros = array();
        $parametros['idprestamo'] = $idprestamo;
        $this->bd->select($this->tabla, '*', 'idprestamo=:idprestamo', $parametros);
        $fila = $this->bd->getRow();
        $prestamo = new Prestamo();
        $prestamo->set($fila);
        return $prestamo;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP, $condicion = "1=1", $parametros = array()) {
        $ordenPredeterminado = "$orden, idprestamo";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "idprestamo";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $prestamo = new Prestamo();
            $prestamo->set($fila);
            $r[] = $prestamo;
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
        $this->bd->query($this->tabla, "idprestamo, idjuego, dni ", array(), "idprestamo");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
