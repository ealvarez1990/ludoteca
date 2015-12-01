<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestorUsuario = new ManejoUsuario($bd);
$gestorLudoteca = new ManejoLudoteca($bd);
$gestorPrestamo = new ManejoPrestamo($bd);

$usuarios=$gestorUsuario->getList();
$juegos=$gestorLudoteca->getList();
$usuarios=$gestorPrestamo->getList();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <h2>Prestamos</h2>
        </header>
        
        <form action="phpalta.php" method="POST">
        <?= Util::getSelect("dni", $gestorUsuario->getValuesSelect()); ?><br>
        <?= Util::getSelect("idjuego", $gestorLudoteca->getValuesSelect()); ?><br>
        <label for="fechaePrestamo">Fecha Prestamo</label>
        <input type="date" name="fechaPrestamo" value="" /><br>
        <label for="fechaeDevolucion">Fecha Devolucion</label>
        <input type="date" name="fechaDevolucion" value="" /><br>
        <input type="submit" value="Prestar" />
        </form>
    </body>
    <?php $bd->close(); ?>
</html>
