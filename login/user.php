<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$canciones = scandir('../subir/mp3/');
$sesion->set("canciones", $canciones);

if (!$sesion->isLogged()) {
    $sesion->sendRedirect("logout.php");
    exit();
} else {

    $canciones = $sesion->get("canciones");
    $cancioncapturada = Request::get("cancionmp3");
    $keycapturada = Request::get("key");
    ?>

    <!DOCTYPE html>
    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>PODCAST</title>

            <!-- Bootstrap Core CSS -->
            <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- MetisMenu CSS -->
            <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

            <!-- Timeline CSS -->
            <link href="../dist/css/timeline.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

            <!-- Morris Charts CSS -->
            <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <link href="css/estilo.css" rel="stylesheet">
        </head>

        <body id="loginfondo">

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
                        <a class="navbar-brand" href="../login/user.php"><?php
                            echo $sesion->getUser();
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
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>Editar perfil</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Herramientas</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar sesión</a>
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
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>Administracion<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../subir/vistasubir.php">Añadir cancion</a>
                                    </li>
                                    <li>
                                        <a href="vistacategorias.php">Ver lista de categorias</a>
                                    </li>
                                    <li>
                                        <a href="vistausuarios.php">Ver lista de usuarios</a>
                                    </li>
                                    <li>
                                        <a href="vistaprivadas.php">Ver canciones privadas</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
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
                        <h1 class="page-header">Escritorio</h1>
                        <h3 class="<?php echo Request::get("class") ?>"><?php echo Request::get("mensaje") ?></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-upload fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Subir Canciones</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../subir/vistasubir.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Sube  tus canciones</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-database fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Musica por categorias</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../login/vistacategorias.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Tu musica ordenada</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-code fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Canciones privadas<br></div>
                                    </div>
                                </div>
                            </div>
                            <a href="../login/vistaprivadas.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Guarda algo para ti</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Lista de usuarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../login/vistausuarios.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Coonoce tu alrededor</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-play-circle-o fa-fw"></i> Reproductor
                                <div class="pull-right">

                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="table-responsive">
                                            Lista de reproduccion:

                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
                                                        <th>Usuario</th>
                                                        <th>Categoria</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($canciones as $key => $value) {
                                                        if (substr($value, -4) == ".mp3") {
                                                            ?><tr class="odd gradeX" >
                                                                <td>
                                                                    <a href="user.php?cancionmp3=<?php echo $value; ?>" ><?php echo ManejadorArchivos::obtenerTituloCancion($value, ".mp3"); ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo ManejadorArchivos::obtenerUsuario($value);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo ManejadorArchivos::obtenerCategoria($value);
                                                                    ?></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        //<?php echo Request::get("imagenportada") 
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>

                                        </div>

                                        <!-- /.table-responsive -->
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="table-responsive">
                                                    <?php
                                                    //Zona de pruebas
                                                    $cogerCanciondelGET = Request::get("cancionmp3");
                                                    $usuarioCancion = ManejadorArchivos::obtenerUsuario($cogerCanciondelGET);
                                                    $nombreOriginal = ManejadorArchivos::obtenerTituloCancionSinExtension($cogerCanciondelGET, ".mp3");
                                                    
                                                    foreach ($canciones as $key => $value) {
//                                                        $cadena=ManejadorArchivos::obtenerTituloCancionSinExtension($value,".jpg");
//                                                        $cadenaNombreCancionenimagen=ManejadorArchivos::trocea($cadena, "_P_");
                                                        $extension=NULL;
                                                        if(substr($value, -4) == ".png" || substr($value, -4) == ".jpg" || substr($value, -4) == ".gif"){
                                                            $extension=substr($value, -4);
                                                        }
                                                        
                                                        $cadenaNombreCancionenimagen=  ManejadorArchivos::nombreCancionImagen($value, $extension);
                                                        if ($nombreOriginal==$cadenaNombreCancionenimagen) {
                                                            if(substr($value, -4) == ".png" || substr($value, -4) == ".jpg"){
                                                            ?>
                                                            <img  class="img-responsive img-rounded" id="portada" alt="portada" src="../subir/mp3/<?php echo $value ?>"> 
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <br>
                                                    <audio controls autoplay>
                                                        <source id="reproductor" src="<?php echo "../subir/mp3/" . Request::get("cancionmp3") ?>" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-4 (nested) -->
                                            <div class="col-lg-8">
                                                <div id="morris-bar-chart"></div>
                                            </div>
                                            <!-- /.col-lg-8 (nested) -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-8 -->

                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../bower_components/raphael/raphael-min.js"></script>
        <script src="../bower_components/morrisjs/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->

        <script src="../dist/js/sb-admin-2.js"></script>
        <script src="../js/codigo.js"></script>

    </body>

</html>
