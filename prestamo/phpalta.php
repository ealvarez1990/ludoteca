<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoPrestamo($bd);
$gestorLudoteca = new ManejoLudoteca($bd);

$page = Request::post("pagina");

$idjuego = Request::post("idjuego");
$dni = Request::post("dni");
$fechaPrestamo = Request::post("fechaPrestamo");
$fechaDevolucion = Request::post("fechaPrestamo");
$ludoteca = $gestorLudoteca->get($idjuego);

if ($ludoteca->getPrestado()!== "1") {
    
    $ludoteca->setPrestado("1");
    var_dump( $gestorLudoteca->set($ludoteca));
    $prestamo = new Prestamo(null, $idjuego, $dni, $fechaPrestamo, $fechaDevolucion);
    $r = $gestor->insert($prestamo);
    //var_dump($bd->getError());
    $bd->close();
    header("Location:prestamo.php?op=Prestamo realizado&class=alert-success&pagina=$page");
}  else {
    $bd->close();
    header("Location:prestamo.php?op=Juego ya prestado&class=alert-danger&pagina=$page");
}
