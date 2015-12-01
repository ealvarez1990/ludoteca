<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoPrestamo($bd);
$idprestamo = Request::get("idprestamo");
$r = $gestor->delete($idprestamo);
//var_dump($bd->getError());
$bd->close();
header("Location: prestamo.php?op=Eliminado&r=$r");