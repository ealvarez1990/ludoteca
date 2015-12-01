<?php

class City {

    private $ID, $Name, $CountryCode, $District, $Population;

    //1º Constructor ->NULL
    function __construct($ID = NULL, $Name = NULL, $CountryCode = NULL, $District = NULL, $Population = NULL) {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->CountryCode = $CountryCode;
        $this->District = $District;
        $this->Population = $Population;
    }

    //2º Getters and setters
    function getID() {
        return $this->ID;
    }

    function getName() {
        return $this->Name;
    }

    function getCountryCode() {
        return $this->CountryCode;
    }

    function getDistrict() {
        return $this->District;
    }

    function getPopulation() {
        return $this->Population;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setName($Name) {
        $this->Name = $Name;
    }

    function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    function setDistrict($District) {
        $this->District = $District;
    }

    function setPopulation($Population) {
        $this->Population = $Population;
    }

    //3º getJson
    function getJson() {
        $prop = get_object_vars($this);
        $resp = '{';
        foreach ($prop as $key => $value) {
            $resp .= '"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

    //4º set Generico

    function setOld($valores, $inicio = 0) {
        $this->ID = $valores[0 + $inicio];
        $this->Name = $valores[1 + $inicio];
        $this->CountryCode = $valores[2 + $inicio];
        $this->District = $valores[3 + $inicio];
        $this->Population = $valores[4 + $inicio];
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
