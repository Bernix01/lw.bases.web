<?php
ini_set("display_errors", 1);
include_once("../php/clases/usuarioColector.php");
include_once("../php/clases/infoUsuarioColector.php");

$usuario_colector = new UsuarioColector();
$info_usuariocolector = new InfoUsuarioColector();
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /login.html");
    die();
}

//if connection is not successful you will see text error
if ($usuario_colector === null) {
    die('Could not connect: ' . mysql_error());
}
var_dump($_POST);
echo "<br>";
if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['contrasenia']) && isset($_POST['rol'])) {
    $usuario = new Usuario(null, $_POST['nickname'], $_POST['contrasenia'], $_POST['email'], null, $_POST['rol']);
    $resultado1 = $usuario_colector->addUsuario($usuario->get_nickname(), $usuario->get_contrasenia(), $usuario->get_email(), $usuario->get_rol());     //inserto el usuario

    if (isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["tagline"]) && $resultado1 != null) {
        //obtener el último id en la tabla de usuario, y agregarlo al campo id_usuario de info_usuario
        $info_usuario = new Info_usuario($_POST["nombres"], $_POST["apellidos"], $_POST["tagline"]);
        $resultado2 = $info_usuariocolector->addInfoUsuario($resultado1->get_id_usuario(), $info_usuario->get_nombres(), $info_usuario->get_apellidos(), 0, $info_usuario->get_tag_line());      //inserto la información de ese usuario
        if ($resultado2) {
            //header("location: listarUsuarios.php?su=1&sinfo=1");
            echo "nonull2";
        } else {
           // header("location: listarUsuarios.php?su=1&sinfo=0");
            echo "null2";
        }

        echo "<br>";
        echo "<br>";
        var_dump($resultado2);

        echo "<br>";
        echo "<br>";
    }
    if ($resultado1 !== null) {
        //header("location: listarUsuarios.php?su=1&sinfo=0");
        echo " nonull1";
    }

    var_dump($resultado1);
    //header("location: listarUsuarios.php?su=0&sinfo=0");
} else {
    var_dump($_POST);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LW</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

        <?php
        include('../php/paginas/menu-admin.php');
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 2.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ingresar usuario</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="name" class="form-control" name="nombres" id="nombres"
                                               placeholder="Ingresar nombres">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" name="apellidos" class="form-control" id="apellidos"
                                               placeholder="Ingresar apellidos">
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Tagline</label>
                                        <textarea maxlength="140" name="tagline" class="form-control" id="tagline"
                                               placeholder="Una breve descripción."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="contrasenia">Contraseña</label>
                                        <input type="password" name="contrasenia" class="form-control" id="contrasenia"
                                               placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="rol">Rol</label>
                                        <select name="rol" id="rol" class="form-control">
                                            <option value="0">Usuario</option>
                                            <option value="1">Profesor</option>
                                            <option value="2">Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.7
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/admin/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="/admin/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/admin/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/dist/js/demo.js"></script>
    </body>
    </html>
    <?php
}
?>
