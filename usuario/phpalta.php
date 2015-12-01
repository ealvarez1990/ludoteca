<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoUsuario($bd);
$dni=Request::post("dni");
$nombre=  Request::post("nombre");
$apellidos=  Request::post("apellidos");
$idhabitacion=  Request::post("idhabitacion");
$usuario = new Usuario($dni,$nombre, $apellidos, $idhabitacion);
$r=$gestor->insert($usuario);
$bd->close();
var_dump($bd->getError());
header ("Location:usuario.php?op=Insertado&r=$r ");