<?php
session_start();
  include_once("../php/clases/emprendimientoColector.php");
 if(isset($_SESSION["rol"]) && $_SESSION["rol"]===2 && isset(_$GET["id_emprendimiento"])){

   $colector_emp= new EmprendimientoColector();
   $emprendimiento= $colector_emp->getEmprendimientoById(_$GET["id_emprendimiento"]);
   if(isset($_POST["id_estudiante"]) && isset($_POST["nombre"])&& isset($_POST["descripcion"])){
     $result= $colector_emp->updateEmprendimiento(_$POST["id_emprendimiento"],$_POST["id_estudiante"],$_POST["nombre"],$_POST["descripcion"]);
     if($result!==null){
       ?>
       <script type="text/javascript">
        alert("Emprendimiento editado con éxito");
       </script>
       <?php
       header('Location: '.$_SERVER['PHP_SELF']);
       exit();
     }
	 else{
		 
	 }
 }
 else{ ?>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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
    include ('../php/paginas/menu-admin.php');
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
            <h3 class="box-title">Editar Emprendimiento</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="name" class="form-control" name= "nombre" id="nombre" placeholder=<?php echo $emprendimiento->get_nombre(); ?>>
              </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder=<?php echo $emprendimiento->get_descripcion(); ?>>
                </div>
              <div class="form-group">
                  <label for="id_estudiante">Id del estudiante</label>
                <input type="text" class="form-control"  name="id_estudiante" id="id_estudiante" placeholder=<?php echo $emprendimiento->get_id_estudiante(); ?>>
              </div>

            <input type="hidden" name="id_emprendimiento" value="<?php echo $_GET['id_emprendimiento'];?>">
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Editar</button>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
              <li>
                  <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                      <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                          <p>Will be 23 on April 24th</p>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-user bg-yellow"></i>

                      <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                          <p>New phone +1(800)555-1234</p>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                      <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                          <p>nora@example.com</p>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <i class="menu-icon fa fa-file-code-o bg-green"></i>

                      <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                          <p>Execution time 5 seconds</p>
                      </div>
                  </a>
              </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
              <li>
                  <a href="javascript:void(0)">
                      <h4 class="control-sidebar-subheading">
                          Custom Template Design
                          <span class="label label-danger pull-right">70%</span>
                      </h4>

                      <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <h4 class="control-sidebar-subheading">
                          Update Resume
                          <span class="label label-success pull-right">95%</span>
                      </h4>

                      <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <h4 class="control-sidebar-subheading">
                          Laravel Integration
                          <span class="label label-warning pull-right">50%</span>
                      </h4>

                      <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0)">
                      <h4 class="control-sidebar-subheading">
                          Back End Framework
                          <span class="label label-primary pull-right">68%</span>
                      </h4>

                      <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                      </div>
                  </a>
              </li>
          </ul>
          <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Report panel usage
                      <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                      Some information about this general settings option
                  </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Allow mail redirect
                      <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                      Other sets of options are available
                  </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Expose author name in posts
                      <input type="checkbox" class="pull-right" checked>
                  </label>

                  <p>
                      Allow the user to show his name in blog posts
                  </p>
              </div>
              <!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Show me as online
                      <input type="checkbox" class="pull-right" checked>
                  </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Turn off notifications
                      <input type="checkbox" class="pull-right">
                  </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                  <label class="control-sidebar-subheading">
                      Delete chat history
                      <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                  </label>
              </div>
              <!-- /.form-group -->
          </form>
      </div>
      <!-- /.tab-pane -->
  </div>
  </aside>
  <!-- /.control-sidebar -->
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

}
else{
  header("location: / ");
}
