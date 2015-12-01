<?php
class Habitacion {
   private $id, $descripcion;
   
   function __construct($id=NULL, $descripcion=NULL) {
       $this->id = $id;
       $this->descripcion = $descripcion;
   }
   function getId() {
       return $this->id;
   }

   function getDescripcion() {
       return $this->descripcion;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
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
