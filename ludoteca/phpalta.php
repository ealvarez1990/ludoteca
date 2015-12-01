<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoLudoteca($bd);
$nombre=  Request::post("nombre");
$editorial=  Request::post("editorial");
$jugadores=  Request::post("jugadores");
$pegi=  Request::post("pegi");
$prestado=  Request::post("prestado");
$completo=  Request::post("completo");
$juego = new Ludoteca(null, $nombre, $editorial, $jugadores, $pegi, $prestado, $completo);
$r=$gestor->insert($juego);
$bd->close();
var_dump($bd->getError());
header ("Location:ludoteca.php?op=Insertado&r=$r ");