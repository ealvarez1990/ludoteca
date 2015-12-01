<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoHabitacion($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Usuario</title>
    </head>
    <body>
        <h2>Alta Usuario</h2>
        <form action="phpalta.php" method="POST">
            <input type="text" name="dni" value="" placeholder="DNI"/><br>
            <input type="text" name="nombre" value="" placeholder="Nombre"/><br>
            <input type="text" name="apellidos" value="" placeholder="Apellidos"/><br>
            <?php echo Util::getSelect("idhabitacion", $gestor->getValuesSelect()); ?><br>
            <input type="submit" value="Alta Usuario" />
        </form>
    </body>
</html>
