<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageCity($bd);
$id = Request::get("ID");
$city = $gestor->get($id);
$gestorCountry = new ManageCountry($bd);
// SIEMPRE SE OCULTAN TODOS LOS CAMPOS DE LA CLAVE PRINCIPAL. 
// SI LA CLAVE PRINCIPAL NO ES AUTONUMERICA, una se pone oculta y otra visible
// la oculta pkid
// la visible id
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index.php">INICIO</a><br>
        <form action="phpedit.php" method="POST">
            <input type="hidden" name="pkID" value="<?php echo $id ?>" /><br>
            <input type="hidden" name="page" value="<?php echo Request::get("page") ?>" /><br>
            <input type="text" name="Name" value="<?php echo $city->getName(); ?>" placeholder="Name"/><br>
              <!--   <input type="text" name="CountryCode" value="<?php echo $city->getCountryCode(); ?>" placeholder="Country Code"/><br>-->
            <?php echo Util::getSelect("CountryCode", $gestorCountry->getValuesSelect(), $city->getCountryCode()); ?><br>
            <input type="text" name="District" value="<?php echo $city->getDistrict(); ?>" placeholder="District"/><br>
            <input type="text" name="Population" value="<?php echo $city->getPopulation(); ?>" placeholder="Population"/><br>
            
            <input type="submit" value="Editar" />
        </form>
    </body>
</html>
