<?php

class Prestamo {

    private $idprestamo, $idjuego, $dni, $fechaPrestamo, $fechaDevolucion;

    function __construct($idprestamo=NULL, $idjuego=NULL, $dni=NULL, $fechaPrestamo=NULL, $fechaDevolucion=NULL) {
        $this->idprestamo = $idprestamo;
        $this->idjuego = $idjuego;
        $this->dni = $dni;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
    }

    function getIdprestamo() {
        return $this->idprestamo;
    }

    function getIdjuego() {
        return $this->idjuego;
    }

    function getDni() {
        return $this->dni;
    }

    function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    function setIdprestamo($idprestamo) {
        $this->idprestamo = $idprestamo;
    }

    function setIdjuego($idjuego) {
        $this->idjuego = $idjuego;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    function set($valores, $inicio = 0) {
        $i = 0;
        foreach ($this as $indice => $valor) {
            $this->$indice = $valores[$i + $inicio];
            $i++;
        }
    }

    public function __toString() {
        $r = '';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r.="<br>";
    }

    function get() {
        $params = array();
        foreach ($this as $key => $value) {
            $params[$key] = $value;
        }
        return $params;
    }

}
