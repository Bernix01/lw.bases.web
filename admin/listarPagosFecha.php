<?php
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /");
    exit();
  }
  include_once("../php/clases/pagoColector.php");
  include_once("../php/clases/facturaColector.php");

  $pago_colector= new PagoColector();
  $factura_colector= new FacturaColector();

  if(isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])){
    $fecha_inicio = strtotime($_POST["fecha_inicio"]);
    $fecha_inicio = date('Y-m-d',$fecha_inicio);
    $fecha_fin = strtotime($_POST["fecha_fin"]);
    $fecha_fin = date('Y-m-d',$fecha_fin);
    $pagos=$pago_colector->getPagosByRange($fecha_inicio,$fecha_fin);
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
          Cursos
          <small>reporte</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Simple</li>
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

                  <th><input type="text" class="form-control" placeholder="forma de pago" disabled></th>
                  <th><input type="text" class="form-control" placeholder="No. factura" disabled></th>
                  <th><input type="text" class="form-control" placeholder="Id estudiante" disabled></th>

                  <th><input type="text" class="form-control" placeholder="No. depósito" disabled></th>
                  <th><input type="text" class="form-control" placeholder="No.tarjeta" disabled></th>
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
                echo "<td>" . $factura->get_id_estudiante() . "</td>";

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
  $(document).ready(function(){
      $('.filterable .btn-filter').click(function(){
          var $panel = $(this).parents('.filterable'),
          $filters = $panel.find('.filters input'),
          $tbody = $panel.find('.table tbody');
          if ($filters.prop('disabled') == true) {
              $filters.prop('disabled', false);
              $filters.first().focus();
          } else {
              $filters.val('').prop('disabled', true);
              $tbody.find('.no-result').remove();
              $tbody.find('tr').show();
          }
      });

      $('.filterable .filters input').keyup(function(e){
          /* Ignore tab key */
          var code = e.keyCode || e.which;
          if (code == '9') return;
          /* Useful DOM data and selectors */
          var $input = $(this),
          inputContent = $input.val().toLowerCase(),
          $panel = $input.parents('.filterable'),
          column = $panel.find('.filters th').index($input.parents('th')),
          $table = $panel.find('.table'),
          $rows = $table.find('tbody tr');
          if (inputContent == '') {
              $rows.show();
          }
          /* Dirtiest filter function ever ;) */
          var $filteredRows = $rows.filter(function(){
              var value = $(this).find('td').eq(column).text().toLowerCase();
              return value.indexOf(inputContent) === -1;
          });
          /* Clean previous no-result if exist */
          $table.find('tbody .no-result').remove();
          /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
          //$rows.show();
          $filteredRows.hide();
          /* Prepend no-result row if all rows are filtered */
          if ($filteredRows.length === $rows.length) {
              $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
          }
      });
  });
  $('.message a').click(function(){
     $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });


  </script>
  </body>
  </html>



<?php
  }else{
    header("location: buscarPagosFecha.php");
  }
 ?>
