<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoHabitacion($bd);
$id=Request::post("id");
$descripcion=  Request::post("descripcion");
$habitacion = new Habitacion($id, $descripcion);
$r=$gestor->insert($habitacion);
$bd->close();
var_dump($bd->getError());
header ("Location:habitacion.php?op=Insertado&r=$r ");