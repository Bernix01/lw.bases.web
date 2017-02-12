<?php
session_start();
include_once("../php/clases/cursoColector.php");
  if(!isset($_SESSION["rol"])|| !isset($_GET["idc"])){
    header("location: /");
  }

  $colector= new CursoColector();
  $result = $colector->getEstudiantesByCurso($_GET["idc"]);
  $curso=$colector->getCursoById($_GET["idc"]);

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
  <section class="content-header">
    <h1>
      Tus certificados
      <small>¡felicidades!</small>
    </h1>
    <ol class="breadcrumb">

      <!--<li><a href="../perfil.php">Perfil</a></li> -->
      <?php
        if($_SESSION["rol"]==2){?>
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="cursosPorUsuario.php"><?php echo $curso->getNombre(); ?></a></li>
          <li class="active">Estudiantes</li>
        <?php }else{
      ?>
      <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="../perfil.php">Perfil</a></li>
      <li><a href="cursosPorUsuario.php"><?php echo $curso->getNombre(); ?></a></li>
      <li class="active">Estudiantes</li>
      <?php } ?>
    </ol>
  </section>
<table class="table" id="testcase" >
  <tr>
    <th>#</th>
    <th>Estudiante</th>
    <th>E-mail</th>
    <th></th>
  </tr>
    <tbody>
      <?php
      $contador=1;

       foreach ($result as $est){

         echo "<tr><td>" . $contador . "</td>";
          echo "<td>" . $est->nombres." ".$est->apellidos . "</td>";
          echo "<td>" . $est->email. "</td>";
          echo "<td><a href='../subirCertificados.php?ide=".$est->id_usuario."'>Agregar certificado</a></td>";
          $contador++;
        }
    ?>

    </tbody>
</table>
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


function demoFromHTML() {
var doc = new jsPDF('p', 'in', 'letter');
var source = $('#testcase').first();
var specialElementHandlers = {
'#bypassme': function(element, renderer) {
return true;
}
};

doc.fromHTML(
source, // HTML string or DOM elem ref.
0.5, // x coord
0.5, // y coord
{
'width': 7.5, // max width of content on PDF
'elementHandlers': specialElementHandlers
});

doc.output('dataurl');
}

</script>
</body>
</html>
