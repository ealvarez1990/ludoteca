<?php

$user = array();
$user["juan"] = 'abc';
$user["pepe"] = 'ghi';
$user["ana"] = '111';
$user["php"] = 'php';

require '../clases/AutoCarga.php';

$login = Request::post("login");
$pass = Request::post("pass");
$sesion = new Session();
$fechaAlta=  Server::getRequestDate("FH");
$usuario = new Usuario($login, NULL, $pass, NULL, NULL, NULL, NULL, $fechaAlta);

//carga de usuarios en la sesion
$sesion->set("usuarios", $user);

//carga de archivos en la sesion
$canciones = scandir('../subir/mp3/');
$sesion->set("canciones", $canciones);


if (isset($user[$login]) && $user[$login] == $pass) {
    $sesion->setUser($usuario);
    $sesion->sendRedirect("user.php?imgp=../subir/mp3/logopodcast.jpg");
} else {
    $sesion->destroy();
    $sesion->sendRedirect("login.php");
}

   
    
