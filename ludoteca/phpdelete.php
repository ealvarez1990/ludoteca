<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoLudoteca($bd);
$pagina=  Request::get("pagina");
$id = Request::get("id");
$r = $gestor->delete($id);
$bd->close();
header("Location: ludoteca.php?op=delete&r=$r&pagina=$pagina");