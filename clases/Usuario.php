<?php

class Usuario {

private $dni, $nombre, $apellidos, $idhabitacion;

function __construct($dni=NULL, $nombre=NULL, $apellidos=NULL, $idhabitacion=NULL) {
    $this->dni = $dni;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->idhabitacion = $idhabitacion;
}

function getDni() {
    return $this->dni;
}

function getNombre() {
    return $this->nombre;
}

function getApellidos() {
    return $this->apellidos;
}

function getIdhabitacion() {
    return $this->idhabitacion;
}

function setDni($dni) {
    $this->dni = $dni;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

function setIdhabitacion($idhabitacion) {
    $this->idhabitacion = $idhabitacion;
}

function set($valores, $inicio = 0){
        $i=0; 
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r='';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return  $r.="<br>";
    }
    
    
    function get(){
        $params=array();
        foreach ($this as $key => $value) {
            $params[$key]=$value;
        }
        return $params;
    }


}
