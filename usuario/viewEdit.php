<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoUsuario($bd);
$dni = Request::get("dni");
$usuario = $gestor->get($dni);
$gestorHabitacion = new ManejoHabitacion($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="phpedit.php" method="POST">
            <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>" />
            <input type="text" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" />
            <?php echo Util::getSelect("idhabitacion", $gestorHabitacion->getValuesSelect()); ?><br>
            <input type="hidden" name="pkdni" value="<?php echo $dni; ?>" />
            <input type="submit" value="Editar Usuario" />
        </form>
    </body>
</html>
