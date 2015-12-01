<?php

require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoPrestamo($bd);
$page = Request::post("pagina");
$idprestamo = Request::post("pkidprestamo");
$idjuego = Request::post("idjuego");
$dni = Request::post("dni");
$fechaPrestamo = Request::post("fechaPrestamo");
$fechaDevolucion = Request::post("fechaPrestamo");
$prestamo = new Prestamo($idprestamo, $idjuego, $dni, $fechaPrestamo, $fechaDevolucion);
$r = $gestor->set($prestamo);
$bd->close();
header("Location:prestamo.php?op=Editado&pageçina=$page");
