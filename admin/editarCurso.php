<?php
session_start();
include_once("../php/clases/cursoColector.php");
include_once("../php/clases/infoCursoColector.php");
$cursoColector = new CursoColector();
$infoColector = new InfoCursoColector();
if (isset($_SESSION["rol"]) && $_SESSION["rol"] == 2 && isset($_POST["idc"]) && isset($_POST["nombre"]) && isset($_POST["costo"]) && isset($_POST["descripcion"]) && isset($_POST["cupo_min"]) && isset($_POST["cupo_max"]) && isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])) {


      $id = $_POST["idc"];
      $id = stripslashes($id);
      $nombre = $_POST["nombre"];
      $costo = $_POST["costo"];
      $descripcion = $_POST["descripcion"];
      $cupo_min = $_POST["cupo_min"];
      $cupo_max= $_POST["cupo_max"];
      $fecha_inicio=$_POST["fecha_inicio"];
      $fecha_fin=$_POST["fecha_fin"];
      $result1=$cursoColector->updateCurso($id,$nombre,$costo);
      $result2= $infoColector->updateInfoCurso($id,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin);

      if ($result1 && $result2) {
        ?>
        <script type="text/javascript">
            alert("Curso editado con éxito");
        </script>
        <?php
        header("location: /admin/editarCurso.php?us=".$_POST["idc"]);
    }
    else{
      ?>
      <script type="text/javascript">
          alert("No se pudo editar el curso");
      </script>
      <?php
      header("location: /admin/editarCurso.php?us=".$_POST["idc"]);

    }
} elseif (isset($_GET['idc']) && !isset($_POST["idc"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == 2) {

    $curso = $cursoColector->getCursoById($_GET["idc"]);
    $icurso = $infoColector->getInfoCursoById($_GET["idc"]);
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
                                <h3 class="box-title">Editar curso
                                <strong><?php echo $curso->getNombre(); ?></strong></h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="edit-course-form" name="edit-course-form" role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">

                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre"  value="<?php echo $curso->getNombre(); ?>" placeholder="nombre" class="form-control"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">cupo mínimo</label>
                                        <input type="number" name="cupo_min" class="form-control"
                                               placeholder="cupo mínimo" value="<?php echo $icurso->get_cupo_min(); ?>"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="1" max="99"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">cupo máximo</label>

                                        <input type="number" name="cupo_max" class="form-control"
                                               placeholder="cupo máximo" value="<?php echo $icurso->get_cupo_max(); ?>"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="1" max="99"/>

                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">costo</label>
                                        <input type="text" name="costo" value="<?php echo $curso->getCosto();?>" class="form-control" placeholder="costo"
                                               maxlength="6"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">descripcion</label>
                                        <input type="text" name="descripcion" value="<?php echo $icurso->get_descripcion(); ?>" class="form-control"
                                               placeholder="Descripción del curso">
                                    </div>

                                    <div class="form-group">

                                        <label>Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control"
                                               value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">

                                        <label>Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-control"
                                               value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <div id="horario">
                                            <!--pide horario-->
                                            <label>Horario inicio</label>
                                            <input class="inicio" type="datetime-local" name="horarios[0][inicio]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i',$icurso->get_fecha_inicio()); ?>">
                                            <br></br>
                                            <label>Horario fin</label>
                                            <input class="fin" type="datetime-local" name="horarios[0][fin]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i',$icurso->get_fecha_fin()); ?>">
                                        </div>
                                        <a href="#" onclick="agregarHorario()"> Agregar horario </a>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Editar curso</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>

                </div>
    <!-- ./wrapper -->
  <script src="../js/jquery.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="../js/edit-course-validation.js"></script>


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
} else {
    header("location: listarCursos.php");
    exit();
}
?>
