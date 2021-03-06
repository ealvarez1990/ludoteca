<?php
require '../clases/AutoCarga.php';
$bd = new BaseDatos();
$gestor = new ManejoUsuario($bd);

$filtro = Request::get("filtro");
if ($filtro === null) {
    $params = array();
    $condicion = "1=1";
} else {
    $params["filtro"] == $filtro . "%";
    $condicion = "nombre like :filtro";
}

$order = Request::get("order");
$orderby = "dni, nombre, apellidos";

if ($order !== null) {
    $orderby = "$order, $orderby";
}

$registros = $gestor->count($condicion, $params);
$paginacion = new Pager($registros, Request::get("rpp"), Request::get("pagina"));
$parametros = new QueryString();
$op = null;
$usuarios = $gestor->getList($paginacion->getPaginaActual(), $order, $paginacion->getRpp(), $condicion, $parametros);
$sesion = new Session();
if (!$sesion->isLogged()) {
    $sesion->sendRedirect("logout.php");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Ludoteca</title>

            <!-- Bootstrap Core CSS -->
            <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- MetisMenu CSS -->
            <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

            <!-- DataTables CSS -->
            <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

            <!-- DataTables Responsive CSS -->
            <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <!-- Estilo -->
            <link href="../css/estilo.css" rel="stylesheet" type="text/css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body>

            <div id="wrapper">

                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?php
                            $usuario = new Usuario();
                            $usuario = $sesion->getUser();
                            echo $usuario->getNombre();
                        }
                        ?></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Menu<span class="fa arrow"></span></a>

                                </h3>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="links" href="../habitacion/habitacion.php">Ver Habitaciones</a>
                                    </li>
                                    <li>
                                        <a class="links" href="../ludoteca/ludoteca.php">Ver Ludoteca</a>
                                    </li>
                                    <li>
                                        <a class="links" href="../prestamo/prestamo.php">Ver Prestamos</a>
                                    </li>
                                    <li>
                                        <a class="links" href="viewAlta.php">Insertar Usuario</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuarios</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabla Usuarios
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        DNI
                                                        <a href="?<?= $parametros->getParams(array("order" => "dni asc")) ?>">▲</a>
                                                        <a href="?<?= $parametros->getParams(array("order" => "dni desc")) ?>">▼</a>
                                                    </td>
                                                    <td>
                                                        NOMBRE
                                                        <a href="?<?= $parametros->getParams(array("order" => "nombre asc")) ?>">▲</a>
                                                        <a href="?<?= $parametros->getParams(array("order" => "nombre desc")) ?>">▼</a>
                                                    </td>
                                                    <td>
                                                        Apellidos
                                                        <a href="?<?= $parametros->getParams(array("order" => "apellidos asc")) ?>">▲</a>
                                                        <a href="?<?= $parametros->getParams(array("order" => "apellidos desc")) ?>">▼</a>
                                                    </td>
                                                    <td>
                                                        IDHABITACION
                                                        <a href="?<?= $parametros->getParams(array("order" => "idhabitacion asc")) ?>">▲</a>
                                                        <a href="?<?= $parametros->getParams(array("order" => "idhabitacion desc")) ?>">▼</a>
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
                                                        <a class="pag" href="?<?= $parametros->getParams(array("pagina" => $paginacion->getPrimera())) ?>"><<</a>
                                                        <a class="pag" href="?<?= $parametros->getParams(array("pagina" => $paginacion->getAnterior())) ?>"><</a>
                                                        <a class="pag" href="?<?= $parametros->getParams(array("pagina" => $paginacion->getSiguiente())) ?>">></a>
                                                        <a class="pag" href="?<?= $parametros->getParams(array("pagina" => $paginacion->getPaginas())) ?>">>></a> 
                                                    </td>
                                                    <td colspan="2">
                                                        <form id="fselect" action="?<?= $trozoEnlace; ?>" method="GET">
                                                            <?php
                                                            $array = ["10" => "10", "50" => "50", "100" => "100"];
                                                            echo Util::getSelect("rpp", $array, 10, false);
                                                            ?>  
                                                            <input type="hidden" name="order" value="<?php echo Request::get("order") ?>" />
                                                            <input type="hidden" name="sort" value="<?php echo Request::get("sort") ?>" />
                                                            <input type="hidden" name="pagina" value="<?php echo Request::get("pagina") ?>" />
                                                            <input type="submit" value="Ver" />    
                                                        </form>  
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php foreach ($usuarios as $indice => $usuario) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $usuario->getDni(); ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $usuario->getNombre(); ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $usuario->getApellidos(); ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $usuario->getIdhabitacion(); ?>
                                                        </td>

                                                        <td>
                                                            <a class="borrar" href="phpdelete.php?dni=<?php echo $usuario->getDni(); ?>&page=<?php echo Request::get("page") ?>">Borrar</a>
                                                        </td>

                                                        <td>
                                                            <a href="viewEdit.php?dni=<?php echo $usuario->getDni(); ?>&page=<?php echo Request::get("page") ?>">Editar</a><br>
                                                        </td>
                                                    </tr>
                                                <?php } $bd->close(); ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        <script src="../js/codigo.js"></script>

    </body>

</html>

