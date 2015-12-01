<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoUsuario($bd);
$dni = Request::get("dni");
$r = $gestor->delete($dni);
//var_dump($bd->getError());
$bd->close();
header("Location: usuario.php?op=delete&r=$r");