<?php
session_start();
include_once("../php/clases/certificadoColector.php");
if(isset($_SESSION["rol"]) && $_SESSION["rol"]==2 && isset($_GET["id_certificado"])){

   $certificado_colector= new CertificadoColector();
   $certificado= $certificado_colector->getCertificadoById($_GET["id_certificado"]);
   if(isset($_POST["id_estudiante"]) && isset($_POST["contenido"])){
        $result= $certificado_colector->updateCertificado($_GET["id_certificado"],$_POST["id_estudiante"],$_POST["contenido"]);
        if($result){
         ?>
         <script type="text/javascript">
          alert("Certificado editado con éxito");
         </script>
         <?php
         header('Location: listarCertificados.php');
         exit();
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
                               <h3 class="box-title">Editar certificado</h3>
                           </div>
                           <!-- /.box-header -->
                           <!-- form start -->
                           <form role="form" method="post" name="create-certificado" action="editarCertificado.php?id_certificado=<?php echo $_GET["id_certificado"];?>">
                               <div class="box-body">
                                   <div class="form-group">
                                       <label for="id_estudiante">Id del estudiante</label>
                                       <input type="text" class="form-control" name="id_estudiante" id="id_estudiante"
                                              placeholder=<?php echo $certificado->get_id_estudiante();?> >
                                   </div>
                                   <div class="form-group">
                                       <label for="contenido">Contenido</label>
                                       <input type="text" class="form-control" name="contenido" id="contenido"
                                              placeholder=<?php echo $certificado->get_contenido();?> >
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
     <script src="../js/create-certificado-validation.js"></script>

   </body>
   </html>



    <?php
  }

}
else{
  header("location: / ");
}
