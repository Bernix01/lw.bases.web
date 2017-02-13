<?php
session_start();
include_once("../php/clases/pagoColector.php");
include_once("../php/clases/facturaColector.php");

  if(!isset($_SESSION["rol"]) || $_SESSION["rol"]!=2){
      header("location: /");
  }
  $colector= new PagoColector();
  $factura_colector= new FacturaColector();
  $pagos = $colector->getAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Simple Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
  <script type="text/javascript">
  function generatePDF(){
    var divHeight = $('#testcase').height();
    var divWidth = $('#testcase').width();
    var ratio = divHeight / divWidth;
    html2canvas(document.getElementById("testcase"),{
      onrendered: function(canvas){
        var img=canvas.toDataURL("image/png",1.0);
        var doc= new jsPDF();
        var width = doc.internal.pageSize.width;
        var height = doc.internal.pageSize.height;
        height = ratio * width;
        doc.addImage(img,"JPEG",0, 0, width, height);
        doc.save("reporte.pdf");
      }
    });
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
        PAGOS
        <small>reporte</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pagos</li>
      </ol>
    </section>

    <div class="container-fluid" >

  <div class="row">
  <div class="panel panel-primary filterable" >
    <div class="panel-heading">
        <h3 class="panel-title">Filtrar</h3>
        <div class="pull-right">
            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
        </div>
    </div>

    <table class="table" id="testcase" >

        <thead>
            <tr class="filters">

                <th><input type="text" class="form-control" placeholder="Forma de pago" disabled></th>
                <th><input type="text" class="form-control" placeholder="No. factura" disabled></th>
                <th><input type="text" class="form-control" placeholder="No.depósito" disabled></th>
                <th><input type="text" class="form-control" placeholder="No.Tarjeta" disabled></th>
            </tr>
        </thead>
        <tbody>
                                    <?php

                                    foreach ($pagos as $pago){
                                      if($pago->get_forma_pago()==1){
                                        $forma="depósito";
                                      }
                                      else{
                                        $forma="tarjeta";
                                      }
                                      $factura=$factura_colector->getFacturaById($pago->get_id_factura());
                                        echo "<td>" . $forma . "</td>";
                                        echo "<td>" . $factura->get_numero_factura() . "</td>";
                                        echo "<td>" . $pago->get_n_deposito(). "</td>";
                                        echo "<td>" . $pago->get_n_tarjeta(). "</td>";
                                        echo "<td><a href='eliminarPago.php?ius=".$pago->get_id_pago()."'>Eliminar</a></td> </tr>";


                                    }
                                    ?>
                                  </tbody>
                                  </table>
                                  <a href="javascript:generatePDF()">Descargar PDF</a>
                                  </div>

                                  </div>

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
<script type="text/javascript">
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
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>
</body>
</html>
