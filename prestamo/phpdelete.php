<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoPrestamo($bd);
$idprestamo = Request::get("idprestamo");
$idjuego = Request::get("idjuego");
$gestorLudoteca = new ManejoLudoteca($bd);
$ludoteca = $gestorLudoteca->get($idjuego);
$ludoteca->setPrestado("0");
var_dump( $gestorLudoteca->set($ludoteca));
$r = $gestor->delete($idprestamo);
//var_dump($bd->getError());
$bd->close();
header("Location: prestamo.php?op=Devuelto&r=$r");