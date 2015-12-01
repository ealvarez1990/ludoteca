<?php

class ManageRelations {

    private $bd = null;

    function __construct($bd) {
        $this->bd = $bd;
    }

    function getListJuegosPrestamo($condicion = NULL, $parametros=array()) {
        if ($condicion === NULL) {
            $condicion = "";
        } else {
            $condicion = "where $condicion";
        }
        $sql = "select prestamo.*, ludoteca.*, usuario.* from prestamo "
                . "left join ludoteca on prestamo.idjuego = ludoteca.id "
                . "left join usuario on prestamo.dni = usuario.dni";

        $this->bd->send($sql, $parametros);
        $r = array();
        $contador = 0;
        while ($fila = $this->bd->getRow()) {
            $prestamo = new Prestamo();
            $prestamo->set($fila);
            $ludoteca = new Ludoteca();
            $ludoteca->set($fila, 5);
            $usuario = new Usuario();
            $usuario->set($fila, 12);
            $r[] = new PrestamoJuegoUSuario($prestamo, $ludoteca, $usuario);
        }
        return $r;
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "idprestamo", array(), "idprestamo");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
