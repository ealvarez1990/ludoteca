<?php

class Country {
    private $Code, $Name, $Continent, $Region, $SurfaceArea, $IndepYear, 
            $Population, $LifeExpectancy, $GNP, $GNPOLd, $LocalName, 
            $GovermentForm, $HeadOfState, $Capital, $Code2;
    
    function __construct($Code=NULL, $Name=NULL, $Continent=NULL, $Region=NULL, 
            $SurfaceArea=NULL, $IndepYear=NULL, $Population=NULL, 
            $LifeExpectancy=NULL, $GNP=NULL, $GNPOLd=NULL, $LocalName=NULL, 
            $GovermentForm=NULL, $HeadOfState=NULL, $Capital=NULL, $Code2=NULL) {
        $this->Code = $Code;
        $this->Name = $Name;
        $this->Continent = $Continent;
        $this->Region = $Region;
        $this->SurfaceArea = $SurfaceArea;
        $this->IndepYear = $IndepYear;
        $this->Population = $Population;
        $this->LifeExpectancy = $LifeExpectancy;
        $this->GNP = $GNP;
        $this->GNPOLd = $GNPOLd;
        $this->LocalName = $LocalName;
        $this->GovermentForm = $GovermentForm;
        $this->HeadOfState = $HeadOfState;
        $this->Capital = $Capital;
        $this->Code2 = $Code2;
    }
    
    function getCode() {
        return $this->Code;
    }

    function getName() {
        return $this->Name;
    }

    function getContinent() {
        return $this->Continent;
    }

    function getRegion() {
        return $this->Region;
    }

    function getSurfaceArea() {
        return $this->SurfaceArea;
    }

    function getIndepYear() {
        return $this->IndepYear;
    }

    function getPopulation() {
        return $this->Population;
    }

    function getLifeExpectancy() {
        return $this->LifeExpectancy;
    }

    function getGNP() {
        return $this->GNP;
    }

    function getGNPOLd() {
        return $this->GNPOLd;
    }

    function getLocalName() {
        return $this->LocalName;
    }

    function getGovermentForm() {
        return $this->GovermentForm;
    }

    function getHeadOfState() {
        return $this->HeadOfState;
    }

    function getCapital() {
        return $this->Capital;
    }

    function getCode2() {
        return $this->Code2;
    }

    function setCode($Code) {
        $this->Code = $Code;
    }

    function setName($Name) {
        $this->Name = $Name;
    }

    function setContinent($Continent) {
        $this->Continent = $Continent;
    }

    function setRegion($Region) {
        $this->Region = $Region;
    }

    function setSurfaceArea($SurfaceArea) {
        $this->SurfaceArea = $SurfaceArea;
    }

    function setIndepYear($IndepYear) {
        $this->IndepYear = $IndepYear;
    }

    function setPopulation($Population) {
        $this->Population = $Population;
    }

    function setLifeExpectancy($LifeExpectancy) {
        $this->LifeExpectancy = $LifeExpectancy;
    }

    function setGNP($GNP) {
        $this->GNP = $GNP;
    }

    function setGNPOLd($GNPOLd) {
        $this->GNPOLd = $GNPOLd;
    }

    function setLocalName($LocalName) {
        $this->LocalName = $LocalName;
    }

    function setGovermentForm($GovermentForm) {
        $this->GovermentForm = $GovermentForm;
    }

    function setHeadOfState($HeadOfState) {
        $this->HeadOfState = $HeadOfState;
    }

    function setCapital($Capital) {
        $this->Capital = $Capital;
    }

    function setCode2($Code2) {
        $this->Code2 = $Code2;
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
    function set($valores, $inicio = 0){
        $i=0; 
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    function getArray($valores=true){
        $array=array();
        foreach ($array as $key => $value) {
            if($valores){
                 $array[$key]=$valor;
            }else{
                 $array[$key]=null;
            }
        }
        return $array;
    }
    
        public function __toString() {
        $r='';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return  $r.="<br>";
    }

    function read(){
         foreach ($this as $key => $valor) {
           $this->$key = Request::req($key);
        }
        
    }
}
