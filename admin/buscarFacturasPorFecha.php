<?php
session_start();

  if(!isset($_SESSION["rol"]) || $_SESSION["rol"]!=2){
    header("location: /");
  }
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
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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
<style>
  .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

  </style>
  <script type="text/javascript" src="jspdf.min.js"></script>
  <script type="text/javascript" src="html2canvas.js"></script>
  <script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/moment.min.js"></script>
  <script src="../js/combodate.js"></script>
  <script type="text/javascript">
  function checkDateRange(form){
    var fecha_i=moment(form.fecha_inicio.value,"YYYY-MM-DD");
    var fecha_f= moment(form.fecha_fin.value,"YYYY-MM-DD");

    if(moment.(fecha_f).isBefore(fecha_i))
          {
          alert("La fecha de inicio no debe de ser mayor a la fecha final");
           return false;
          }
       return true;
  }
  </script>
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
        Cursos
        <small>reporte</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ingresar Emprendimiento</h3>
                    </div>


    <form method="post" name="rango-busqueda" action="buscarFacturasRango.php" onsubmit="return checkDateRange(this)">
    <div class="form-group">
    <label for="fecha_inicio">Fecha inicio</label>
    <input type="text" id="fecha_inicio" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="fecha_inicio" value="09-01-2016">
    </div>
    <div class="form-group">
    <label for="fecha_inicio">Fecha fin</label>
    <input type="text" id="fecha_fin" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="fecha_fin" value="09-01-2016">
  </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Buscar facturas</button>
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
<script src="../js/jquery.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../js/combodate.js"></script>
<script type="text/javascript">
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
$(function(){
    $('#date').combodate();
});
$('input').combodate({
    minYear: 2016,
    maxYear: 2017,
    minuteStep: 10
});
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}
var su=getURLParameter("su");
var sinfo=getURLParameter("sinfo");
if(su==0) {
    document.getElementById('msg').innerHTML = "No se pudo ingresar el curso";
}else{
    if(sinfo==0){
      document.getElementById('msg').innerHTML = "No se pudo ingresar la información adicional del curso";
    }

}
document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')


$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="Hello World"></script>


</body>
</html>
