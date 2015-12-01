<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoUsuario($bd);
$page=  Request::post("pagina");
$dni=  Request::post("pkdni");
$nombre=  Request::post("nombre");
$apellidos=  Request::post("apellidos");
$idhabitacion=  Request::post("idhabitacion");
$usuario = new Usuario($dni, $nombre, $apellidos, $idhabitacion);
$r=$gestor->set($usuario);
$bd->close();
header ("Location:usuario.php?op=Editado&pagina=$page");