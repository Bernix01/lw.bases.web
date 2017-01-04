<?php
ini_set("display_errors", 1);
include_once("../php/clases/usuarioColector.php");

$usuario_colector = new UsuarioColector();
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /login.html");
    die();
}

//if connection is not successful you will see text error
if ($usuario_colector === null) {
    die('Could not connect: ' . mysql_error());
}
if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['contrasenia']) && isset($_POST['rol']) ) {
    $usuario= new Usuario(null,$_POST['nickname'],$_POST['contrasenia'],$_POST['email'],null,$$_POST['rol']);
    $resultado = $usuario_colector->addUsuario($usuario);     //inserto el usuario

    if(isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["tag_line"])){
      //obtener el último id en la tabla de usuario, y agregarlo al campo id_usuario de info_usuario
      $info_usuario=new InfoUsuario($_POST["nombres"],$_POST["apellidos"],$_POST["tag_line"]));
      $resultado = $usuario_colector->addUsuario($usuario);      //inserto la información de ese usuario
      (header("location: listarUsuarios.php?su=1&sinfo=1")) ;
    }
    (header("location: .listarUsuarios.php?su=1&sinfo=0")) ;
} else {


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
                    Cursos
                    <small>Agregar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Curso</a></li>
                    <li class="active">Crear nuevo curso</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Crear nuevo curso</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="create-course-form" name="create-course-form" role="form">
                                <div class="box-body">
                                    <div class="form-group">

                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" placeholder="nombre" class="form-control" required="required"/>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">cupo mínimo</label>
                                        <input type="number" name="cupo_min" class="form-control" placeholder="cupo mínimo"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="0" max="99"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">cupo máximo</label>

                                        <input type="number" name="cupo_max" class="form-control"  placeholder="cupo máximo"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="0" max="99"/>

                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">costo</label>
                                        <input type="text" name="costo" class="form-control"  placeholder="costo" maxlength="6"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">descripcion</label>
                                        <input type="text" name="descripcion" class="form-control"  placeholder="Descripción del curso">
                                    </div>

                                    <div class="form-group">

                                        <label>Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control"  value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">

                                        <label>Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-control"  value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <div id="horario">
                                            <!--pide horario-->
                                            <label>Horario inicio</label>
                                            <input class="inicio" type="datetime-local" name="horarios[0][inicio]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i'); ?>">
                                            <label>Horario fin</label>
                                            <input class="fin" type="datetime-local" name="horarios[0][fin]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i'); ?>">
                                        </div>
                                        <a href="#" onclick="agregarHorario()"> Agregar horario </a>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Crear curso</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <div class="col col-sm-10 col-sm-offset-1">
                        <form class="create-course-form" name="create-course-form">

                            <!-- Imagen de un "+" para desplegar más horarios
                            <img src="media/1481019034_add.png">      -->



                        </form>
                    </div>
                </div>
                <script src="../js/jquery.js"></script>
                <script src="../js/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
                <script src="../js/create-course-validation.js"></script>

              
    </body>
    </html>
<?php }
