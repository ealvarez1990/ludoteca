<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageCity($bd);
$id = Request::get("ID");
$r = $gestor->deleteCity($id);
//var_dump($bd->getError());
$bd->close();

header("Location: index.php?op=delete&r=$r");

