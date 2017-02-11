<?php
  ini_set("display_errors", 1);
  include_once("../php/clases/emprendimientoColector.php");
  session_start();
  if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
      header("location: /");
      exit();
  }
  $emp_colector=new EmprendimientoColector();
  //if connection is not successful you will see text error
  if ($emp_colector == null) {
      die('Could not connect: ');
  }

  if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['id_estudiante'])) {
      $result=$emp_colector->addEmprendimiento($_POST['id_estudiante'],$_POST['nombre'],$_POST['descripcion']);
      if(!$result){
        ?>
        <script type="text/javascript">
         alert("No se pudo ingresar el emprendimiento");
        </script>
        <?php
        header('Location: listarEmprendimientos.php');
        exit();
      }
      else{?>
        <script type="text/javascript">
         alert("Emprendimiento agregado con éxito");
        </script>
        <?php
        header('Location: '.$_SERVER['PHP_SELF']);
      }
  }
  else {
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
                                  <h3 class="box-title">Ingresar Emprendimiento</h3>
                              </div>
                              <!-- /.box-header -->
                              <!-- form start -->
                              <form role="form" method="post" name="create-emprendimiento">
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="nombre">Nombre</label>
                                          <input type="text" required="required" minlength="2" maxlength="46" class="form-control" name="nombre" id="nombre"
                                                 placeholder="Ingresar nombre">
                                      </div>
                                      <div class="form-group">
                                          <label for="descripcion">Descripcion</label>
                                          <input type="text" name="descripcion" required="required" class="form-control" id="descripcion"
                                                 placeholder="Ingresar descripcion">
                                      </div>
                                      <div class="form-group">
                                          <label for="id_estudiante">id_estudiante</label>
                                          <input type="text" class="form-control" required="required" minlength="13" maxlength="13" name="id_estudiante" id="id_estudiante" placeholder="id_estudiante">
                                      </div>



                                  </div>
                                  <!-- /.box-body -->

                                  <div class="box-footer">
                                      <button type="submit" class="btn btn-primary">Crear nuevo emprendimiento</button>
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
           immediately after the contid_estudiante sidebar -->
          <div class="contid_estudiante-sidebar-bg"></div>

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
      <!-- SlimScid_estudiantel 1.3.0 -->
      <script src="/admin/plugins/slimScid_estudiantel/jquery.slimscid_estudiantel.min.js"></script>
      <!-- ChartJS 1.0.1 -->
      <script src="/admin/plugins/chartjs/Chart.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="/admin/dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="/admin/dist/js/demo.js"></script>
      <script type="text/javascript">
      <!-- jQuery -->
      		<script src="js/jquery.js"></script>
      		<script src="js/jquery.validate.min.js"></script>
      	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
      		<script src="../js/create-emprendimiento-validation.js"></script>
      <script type="text/javascript">$('.message a').click(function(){
         $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
      });</script>
      <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

      		<!-- Bootstrap JavaScript -->
      		<script src="js/bootstrap.min.js"></script>
      		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       		<script src="Hello World"></script>
      </script>
      </body>
      </html>
      <?php
  }
?>
