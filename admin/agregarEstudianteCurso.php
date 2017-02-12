<?php
  ini_set("display_errors", 1);
  include_once("../php/clases/cursoColector.php");
  session_start();
  if (!(isset($_SESSION["rol"])) || $_SESSION["rol"] != 2 ) {
      header("location: /");
      exit();
  }
  $curso_colector=new CursoColector();
  $curso=$curso_colector->getCursoById($_GET["idc"]);
  //if connection is not successful you will see text error
  if ($curso_colector == null) {
      die('Could not connect: ');
  }

  if (isset($_POST['id_estudiante']) && isset($_POST["idc"])) {
      $num_cursos=$curso_colector->getCursosEstudiantes($_POST['id_estudiante'],$_POST["idc"]);
      if($num_cursos==0){
      $result=$curso_colector->addEstudianteAcurso($_POST["id_estudiante"],$_POST["idc"]);
      if(!$result){
        ?>
        <script type="text/javascript">
         alert("No se pudo agregar el estudiante al curso");
        </script>
        <?php
        header('Location: listarCursos.php');
        exit();
      }
      else{?>
        <script type="text/javascript">
         alert("Estudiante agregado con éxito");
        </script>
        <?php
          header('Location: listarCursos.php');
      }
    }
    else{?>
      <script type="text/javascript">
       alert("El estudiante ya se encuentra en el curso");
      </script>
      <?php
      header('Location: listarCursos.php');
    }
  }
  elseif(isset($_GET["idc"])) {
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
                      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                  <h3 class="box-title">Agregar estudiante al curso de <?php echo $curso->getNombre(); ?></h3>
                              </div>
                              <!-- /.box-header -->
                              <!-- form start -->
                              <form role="form" method="post" name="create-emprendimiento">
                                  <div class="box-body">

                                      <div class="form-group">
                                          <label for="id_estudiante">id_estudiante</label>
                                          <input type="text" class="form-control" required="required" minlength="10" maxlength="13" name="id_estudiante" id="id_estudiante" placeholder="id_estudiante">
                                      </div>
                                  </div>
                                  <!-- /.box-body -->
                                  <input type="hidden" name="idc" value=<?php echo $curso->get_id_curso();?>>
                                  <div class="box-footer">
                                      <button type="submit" class="btn btn-primary">Agregar estudiante</button>
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
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
          </footer>


        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
      </body>
      </html>
      <?php
  }
  else{
    header("location: /");
  }
?>
