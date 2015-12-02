<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageCity($bd);
$page=  Request::post("page");
$ID=  Request::post("pkID");
$Name=  Request::post("Name");
$CountryCode=  Request::post("CountryCode");
$District=  Request::post("District");
$Population=  Request::post("Population");
$city = new City($ID, $Name, $CountryCode, $District, $Population);
$r=$gestor->set($city);
$bd->close();
header ("Location:index.php?op=Editado&page=$page");
