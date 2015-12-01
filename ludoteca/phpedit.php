<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoLudoteca($bd);
$pkid=  Request::post("pkid");
$nombre=  Request::post("nombre");
$editorial=  Request::post("editorial");
$jugadores=  Request::post("jugadores");
$pegi=  Request::post("pegi");
$prestado=  Request::post("prestado");
var_dump($prestado);
$completo=  Request::post("completo");
$juego = new Ludoteca($pkid, $nombre, $editorial, $jugadores, $pegi, $prestado, $completo);
$r=$gestor->insert($juego);
$bd->close();
var_dump($bd->getError());
//header ("Location:ludoteca.php?op=Editado&r=$r ");