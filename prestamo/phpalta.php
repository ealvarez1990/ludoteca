<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoPrestamo($bd);
$gestorLudoteca = new ManejoLudoteca($bd);
$ludoteca = $gestorLudoteca->getList();
$page = Request::post("pagina");

$idjuego = Request::post("idjuego");
$dni = Request::post("dni");
$fechaPrestamo = Request::post("fechaPrestamo");
$fechaDevolucion = Request::post("fechaPrestamo");


foreach ($ludoteca as $key => $juego) {
    
        var_dump($juego->getPrestado());
    }


$prestamo = new Prestamo(null,$idjuego, $dni, $fechaPrestamo, $fechaDevolucion);
$r = $gestor->insert($prestamo);
var_dump($bd->getError());
$bd->close();
header("Location:prestamo.php?op=Insertado&pagina=$page");
