<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoHabitacion($bd);
$pagina=  Request::get("pagina");
$id = Request::get("id");
$r = $gestor->delete($id);
//var_dump($bd->getError());
$bd->close();
header("Location: habitacion.php?op=delete&r=$r&pagina=$pagina");