<?php
require '../clases/AutoCarga.php';
$bd= new BaseDatos();
$gestor= new ManejoUsuario($bd);

$sesion = new Session();
$sesion->set("usuario", $user);

//Caramos elementos de login
$nombre = Request::post("nombre");
$dni = Request::post("dni");

$usuario= $gestor->get($dni);


var_dump($usuario);
//carga de usuarios en la sesion


if (isset($user[$nombre]) && $user[$nombre] == $dni) {
    $sesion->setUser($usuario);
   // $sesion->sendRedirect("../user.php");
} else {
    $sesion->destroy();
   // $sesion->sendRedirect("../index.php");
}

   
    
