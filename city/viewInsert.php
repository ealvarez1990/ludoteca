<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestorCountry = new ManageCountry($bd);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index.php">INICIO</a><br>
        <form action="phpinsert.php" method="POST">
            <input type="text" name="Name" value="" placeholder="Name"/><br>
            <?php echo Util::getSelect("CountryCode", $gestorCountry->getValuesSelect()); ?><br>
            <input type="text" name="District" value="" placeholder="District"/><br>
            <input type="text" name="Population" value="" placeholder="Population"/><br>
            <input type="submit" value="Insertar" />
        </form>
    </body>
</html>
