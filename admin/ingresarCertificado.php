<?php
ini_set("display_errors", 1);
include_once("../php/clases/usuarioColector.php");
include_once("../php/clases/certificadoColector.php");

$usuario_colector = new UsuarioColector();
$certificado_colector = new CertificadoColector();
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /login.html");
    die();
}


if (isset($_POST['id_estudiante']) && isset($_POST['contenido']) ) {
    $usuario = $usuario_colector->getUserById($_POST['id_estudiante']);
    if($usuario===null){
      //no existe tal usuario en la base
      header("location: listarCertificados.php?su=0");

    }
    else{
      $resultado= $certificado_colector->addCertificado($_POST['contenido'],$_POST['id_estudiante']);
      if ($resultado) {
          header("location: listarCertificados.php?su=1");
      }
      else{
        header("location: listarCertificados.php?su=2");
      }
    }

} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <script src="../js/jquery.validate.min.js"></script>
      <script src="../js/create-certificado-validation.js"></script>

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
                                <h3 class="box-title">Ingresar certificado</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" name="create-certificado" >
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="id_estudiante">Id del estudiante</label>
                                        <input type="text" class="form-control" name="id_estudiante" id="id_estudiante"
                                               required="required" placeholder="Ingresar el número de cédula del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="contenido">Contenido</label>
                                        <input type="text" class="form-control" name="contenido" id="contenido"
                                               placeholder="Ingresar contenido">
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

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/adjax/jquery.validate/1.13.0/additional-methods.min.js"></script>

    </body>
    </html>
    <?php
}
?>
