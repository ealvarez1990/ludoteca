<?php

class PrestamoJuegoUSuario {
    private $prestamo, $juego, $usuario;
    
    function __construct(Prestamo $prestamo, Ludoteca $juego, Usuario $usuario) {
        $this->prestamo = $prestamo;
        $this->juego = $juego;
        $this->usuario = $usuario;
    }
    
    function getPrestamo() {
        return $this->prestamo;
    }

    function getJuego() {
        return $this->juego;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setPrestamo($prestamo) {
        $this->prestamo = $prestamo;
    }

    function setJuego($juego) {
        $this->juego = $juego;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



}
