<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageCity($bd);
$Name=  Request::post("Name");
$CountryCode=  Request::post("CountryCode");
$District=  Request::post("District");
$Population=  Request::post("Population");
$city = new City(0,$Name, $CountryCode, $District, $Population);
//var_dump($city);
$r=$gestor->insertCity($city);
$bd->close();
echo '<br>';
echo $r;
echo '<br>';
var_dump($bd->getError());
//header ("Location:index.php?op=Insertado ");
