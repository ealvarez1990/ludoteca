<?php

class Ludoteca {
  private $id, $nombre, $editorial, $jugadores, $pegi, $prestado, $completo;
  
  function __construct($id=NULL, $nombre=NULL, $editorial=NULL, $jugadores=NULL, $pegi=NULL, $prestado=NULL, $completo=NULL) {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->editorial = $editorial;
      $this->jugadores = $jugadores;
      $this->pegi = $pegi;
      $this->prestado = $prestado;
      $this->completo = $completo;
  }
  
  function getId() {
      return $this->id;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getEditorial() {
      return $this->editorial;
  }

  function getJugadores() {
      return $this->jugadores;
  }

  function getPegi() {
      return $this->pegi;
  }

  function getPrestado() {
      return $this->prestado;
  }

  function getCompleto() {
      return $this->completo;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setEditorial($editorial) {
      $this->editorial = $editorial;
  }

  function setJugadores($jugadores) {
      $this->jugadores = $jugadores;
  }

  function setPegi($pegi) {
      $this->pegi = $pegi;
  }

  function setPrestado($prestado) {
      $this->prestado = $prestado;
  }

  function setCompleto($completo) {
      $this->completo = $completo;
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
