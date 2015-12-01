<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManageCity($bd);
//$page = Request::get("page");
//if ($page === NULL || $page === "") {
//    $page = 1;
//}
//$registros = $gestor->count();
//$pages = ceil($registros / Configuracion::NRPP);
//
//$order = Request::get("order");
//$sort = Request::get("sort");
//
//$orden = "$order $sort";
//$trozoEnlace = "";
//
//if (trim($orden) != "") {
//    $trozoEnlace = "&order=$order&sort=$sort";
//}
//
//$ciudades = $gestor->getList($page, $orden);
//$op = Request::get("op");
//$r = Request::get("r");

$filtro = Request::get("filtro");
if ($filtro === null) {
    $params = array();
    $condicion = "1=1";
} else {
    $params["filtro"] == $filtro . "%";
    $condicion = "Name like :filtro";
}

$order = Request::get("order");
$orderby = "Name, CountryCode, ID";

if ($order !== null) {
    $orderby = "$order, $orderby";
}

$registros = $gestor->count($condicion, $params);
$paginacion = new Pager($registros, Request::get("rpp"), Request::get("pagina"));
$parametros = new QueryString();
$op = null;
$ciudades = $gestor->getList($paginacion->getPaginaActual(), $order, $paginacion->getRpp(), $condicion, $parametros);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>City</title>
        <style>
            body{
                width: 100%;
                margin: 0 auto;
            }
            header{
                text-align: center;
                margin: 0 auto;  
            }
            div{
                width: 60%;
                margin: 0 auto;
            }

            td{
                border: 0px solid black;
                padding-left: 10px;
                padding-right: 10px;
            }

            thead td{
                border: 1px solid black;
                text-align: center;
                font-weight: bold;
                font-size: 0.8em
            }
            a{
                text-align: center;
                text-decoration: none;
                color:green;
            }
            .pag{
                margin-left: 30px;
                font-weight: bold;
                font-size: 1.4em
            }
            .links{
                margin-bottom: 25px;
            }
        </style>
    </head>
    <body>
        <header>
            <h2>WORLD - <h3>Ciudades, paises y lenguas del mundo</h3></h2>
        </header>
        <div>
            <h3>
                <a class="links" href="../country/index.php">Ver Paises</a>
            </h3>
            <h3>
                <a class="links" href="viewInsert.php">Insertar Ciudad</a>
            </h3>
            <h4>
                <?php
                if ($op != NULL) {
                    echo 'Se ha borrado correctamente';
                } else {
                    echo 'No se ha borrado';
                }
                ?> 
            </h4>
            <table>
                <thead>
                    <tr>
                        <td>
                            ID 
                            <a href="?<?= $parametros->getParams(array("order" => "ID asc")) ?>">▲</a>
                            <a href="?<?= $parametros->getParams(array("order" => "ID desc")) ?>">▼</a>
                        </td>
                        <td>
                            Name 
                            <a href="?<?= $parametros->getParams(array("order" => "Name asc")) ?>">▲</a>
                            <a href="?<?= $parametros->getParams(array("order" => "Name desc")) ?>">▼</a>
                        </td>
                        <td>
                            Country Code 
                            <a href="?<?= $parametros->getParams(array("order" => "CountryCode asc")) ?>">▲</a>
                            <a href="?<?= $parametros->getParams(array("order" => "CountryCode desc")) ?>">▼</a>
                        </td>
                        <td>
                            District 
                            <a href="?<?= $parametros->getParams(array("order" => "District asc")) ?>">▲</a>
                            <a href="?<?= $parametros->getParams(array("order" => "District desc")) ?>">▼</a>
                        </td>
                        <td>
                            Population 
                            <a href="?<?= $parametros->getParams(array("order" => "Population asc")) ?>">▲</a>
                            <a href="?<?= $parametros->getParams(array("order" => "Population desc")) ?>">▼</a>
                        </td>

                        <td>
                            Borrar
                        </td>

                        <td>
                            Editar
                        </td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="3">
                            <a class="pag" href="index.php?<?= $parametros->getParams(array("pagina" => $paginacion->getPrimera())) ?>"><<</a>
                            <a class="pag" href="index.php?<?= $parametros->getParams(array("pagina" => $paginacion->getAnterior())) ?>"><</a>
                            <a class="pag" href="index.php?<?= $parametros->getParams(array("pagina" => $paginacion->getSiguiente())) ?>">></a>
                            <a class="pag" href="index.php?<?= $parametros->getParams(array("pagina" => $paginacion->getPaginas())) ?>">>></a> 
                        </td>
                        <td colspan="2">
                            <form id="fselect" action="?<?= $trozoEnlace; ?>" method="GET">
                                <?php
                                $array = ["10" => "10", "50" => "50", "100" => "100"];
                                echo Util::getSelect("rpp", $array, 10, false);
                                ?>  
                                <input type="hidden" name="order" value="<?php echo Request::get("order") ?>" />
                                <input type="hidden" name="sort" value="<?php echo Request::get("sort") ?>" />
                                <input type="hidden" name="page" value="<?php echo Request::get("page") ?>" />
                                <input type="submit" value="Ver" />    
                            </form>  
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($ciudades as $indice => $ciudad) { ?>
                        <tr>
                            <td>
                                <?php echo $ciudad->getID(); ?>
                            </td>

                            <td>
                                <?php echo $ciudad->getName(); ?>
                            </td>

                            <td>
                                <?php echo $ciudad->getCountryCode(); ?>
                            </td>

                            <td>
                                <?php echo $ciudad->getDistrict(); ?>
                            </td>

                            <td>
                                <?php echo $ciudad->getPopulation(); ?>
                            </td>

                            <td>
                                <a class="borrar" href="phpdelete.php?ID=<?php echo $ciudad->getID(); ?>&page=<?php echo Request::get("page") ?>">Borrar</a>
                            </td>

                            <td>
                                <a href="viewEdit.php?ID=<?php echo $ciudad->getID(); ?>&page=<?php echo Request::get("page") ?>">Editar</a><br>
                            </td>
                        </tr>
                    <?php } $bd->close(); ?>
                </tbody>
            </table> 
        </div>
        <script src="../js/codigo.js"></script>
    </body>
</html>
