<?php

class User {

    private $nombre, //max40
            $apellidos,//max80
            $clave,//min 5 max 20
            $login,//max40
            $correo,//max100
            $alias,//max40
            $fechaNac,//Y-m-d
            $fechaAlta,//Y-m-d
            $sexo,// m/f
            $rol,// true / false
            $admin,// true/false
            $activo,// true/false
            $ip; //ip

    function __construct($nombre = NULL, $apellidos = NULL, $clave = NULL, $correo = NULL, $alias = NULL, $login = NULL, $fechaNac = NULL, $fechaAlta = NULL, $sexo = NULL, $rol = NULL, $admin = NULL, $activo = NULL, $ip=NULL) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->clave = $clave;
        $this->correo = $correo;
        $this->alias = $alias;
        $this->login = $login;
        $this->fechaNac = $fechaNac;
        $this->fechaAlta = $fechaAlta;
        $this->sexo = $sexo;
        $this->rol = $rol;
        $this->admin = $admin;
        $this->activo = $activo;
        $this->ip = $ip;
    }
    function getIp() {
        return $this->ip;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

        function getLogin() {
        return $this->login;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getClave() {
        return $this->clave;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getAlias() {
        return $this->alias;
    }

    function getFechaNac() {
        return $this->fechaNac;
    }

    function getFechaAlta() {
        return $this->fechaAlta;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getRol() {
        return $this->rol;
    }

    function getAdmin() {
        return $this->admin;
    }

    function getActivo() {
        return $this->activo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    public function __toString() {
        return $this->nombre;
    }

    public function getJSON() {
        $prop = get_object_vars($this);
        $resp = '{';
        foreach ($prop as $key => $value) {
            $resp .= '"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}
