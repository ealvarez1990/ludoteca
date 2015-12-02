<?php

require '../clases/AutoCarga.php';

$nombre = Request::post("nombre");
$dni = Request::post("dni");
$bd = new BaseDatos();
$sesion = new Session();
$modelo = new ManejoUsuario($bd);
$socio = $modelo->get($dni);
$sesion->setUser($socio);

if (isset($socio)) {
    if ($socio->getNombre() == "root") {
        $bd->close();
        header("Location:../prestamo/prestamo.php");
    } else {
        $bd->close();
        header("Location:user.php");
    }
} else {
    $sesion->destroy();
    $bd->close();
    var_dump("error");
}
