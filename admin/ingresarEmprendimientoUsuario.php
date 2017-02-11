<?php
ini_set("display_errors", 1);
include_once("../php/clases/emprendimientoColector.php");
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] == 2) {
    header("location: ../");
    exit();
}
$emp_colector=new EmprendimientoColector();
//if connection is not successful you will see text error
if ($emp_colector == null) {
    die('Could not connect: ');
}

if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $result=$emp_colector->addEmprendimiento($_SESSION['id'],$_POST['nombre'],$_POST['descripcion']);
    if(!$result){
      ?>
      <script type="text/javascript">
       alert("No se pudo ingresar el emprendimiento");
      </script>

      <?php
    }
    else{?>
      <script type="text/javascript">
       alert("Emprendimiento agregado con éxito");
      </script>
      <?php
    }
    header('Location: emprendimientosPorUsuario.php');
}
else {
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
  <script src="jquery-3.1.1.min.js"></script>
  <script src=”//mrrio.github.io/jsPDF/dist/jspdf.debug.js”></script>



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
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
<div class="content-wrapper">

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
                              <input type="text" required="required" minlength="2" maxlength="46"class="form-control" name="nombre" id="nombre"
                                     placeholder="Ingresar nombre">
                          </div>
                          <div class="form-group">
                              <label for="descripcion">Descripcion</label>
                              <input type="text" name="descripcion" required="required" class="form-control" id="descripcion"
                                     placeholder="Ingresar descripcion">
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
<a href="emprendimientosPorUsuario.php"><strong>Volver</strong></a>
</div>
</div>
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
<

<script src="examples-legacy.js"></script>
<script type="text/javascript">
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}



$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
}

</script>
</body>
</html>
<?php
}
?>
