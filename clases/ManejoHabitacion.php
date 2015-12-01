<?php

class ManejoHabitacion {
   private $bd = NULL;
    private $tabla = 'habitacion';

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function set(Habitacion $habitacion) {
        $paramsWhere = array();
        $paramsWhere["id"] = $habitacion->getId();
        return $this->bd->update($this->tabla, $habitacion->get(), $paramsWhere);
    }

    function insert(Habitacion $habitacion) {
        return $this->bd->insert($this->tabla, $habitacion->get());
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
        $habitacion = new Habitacion();
        $habitacion->set($fila);
        return $habitacion;
    }

    function get($id) {
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, '*', 'id=:id', $parametros);
        $fila = $this->bd->getRow();
        $habitacion = new Habitacion();
        $habitacion->set($fila);
        return $habitacion;
    }
    
        function getValuesSelect() {
        $this->bd->query($this->tabla, "id,id", array(), "id");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

    function getList($pagina = 1, $orden = "", $nrpp = Configuracion::NRPP) {
        $ordenPredeterminado = "$orden, id";
        if (trim($orden) === "" || trim($orden) === NULL) {
            $ordenPredeterminado = "id";
        }
        $registroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado, "$registroInicial, $nrpp");
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $habitacion = new Habitacion();
            $habitacion->set($fila);
            $r[] = $habitacion;
        }
        return $r; //Devuelve un array de usuarios;
    }
    
    function paginacion() {
        $sql = "select count from $this->bd";
    }
    
    function count($condicion = "1=1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}
