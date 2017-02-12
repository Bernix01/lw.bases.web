<?php
  session_start();
  if(!isset($_SESSION["rol"])){
    header("Location : ../");
  }
  include_once("../php/clases/cursoColector.php");
  include_once("../php/clases/infoCursoColector.php");
  $colector= new CursoColector();
  if ($_SESSION["rol"]==0){


    $result = $colector->getCursosByStudentId($_SESSION["id"]);

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
        Tus cursos
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="../perfil.php">Perfil</a></li> -->
        <li><a href="../perfil.php">Perfil</a></li>
        <li class="active">Tus cursos</li>
      </ol>
    </section>
  <table class="table" id="testcase" >
    <tr>
      <th>#</th>
      <th>Nombre del curso</th>
      <th>Descripcion</th>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
    </tr>
      <tbody>
        <?php
        $contador=1;

         foreach ($result as $curso){

           echo "<tr>
              <td>" . $contador . "</td>";
                                  echo "
                <td>" . $curso->nombre . "</td>";
                echo "
                <td>" . $curso->descripcion . "</td>";
                echo "
                <td>" . $curso->fecha_inicio . "</td>";
                echo "
                <td>" . $curso->fecha_fin . "</td>";
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
  </body>
  </html>

<?php
  }
  elseif ($_SESSION["rol"]==1){
    $result = $colector->getCursosByProfId($_SESSION["id"]);

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
        Tus cursos
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="../perfil.php">Perfil</a></li> -->
        <li><a href="../perfil.php">Perfil</a></li>
        <li class="active">Tus cursos</li>
      </ol>
    </section>
  <table class="table" id="testcase" >
    <tr>
      <th>#</th>
      <th>Nombre del curso</th>
      <th>Descripcion</th>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
      <th><th>
    </tr>
      <tbody>
        <?php
        $contador=1;

         foreach ($result as $curso){

           echo "<tr>
              <td>" . $contador . "</td>";
                                  echo "
                <td>" . $curso->nombre . "</td>";
                echo "
                <td>" . $curso->descripcion . "</td>";
                echo "
                <td>" . $curso->fecha_inicio . "</td>";
                echo "
                <td>" . $curso->fecha_fin . "</td>";
                echo "<td><a href='listarEstudiantesPorCurso.php?idc=".$curso->id_curso."'>Ver</a></td>";
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
  </body>
  </html>

<?php }else{
  $result = $colector->getAll();
  $info_curso_colector = new InfocursoColector();

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
      Tus cursos
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tus cursos</li>
    </ol>
  </section>
<table class="table" id="testcase" >
  <tr>
    <th>#</th>
    <th>Nombre del curso</th>
    <th>Descripcion</th>
    <th>Fecha inicio</th>
    <th>Fecha fin</th>
    <th><th>
    <th><th>
  </tr>
    <tbody>
      <?php

       foreach ($result as $curso){
         $info=$info_curso_colector->getInfoCursoById($curso->get_id_curso());
         if (!$info){ $info= new Info_curso();}
         echo "<tr>
            <td>" . $curso->get_id_curso() . "</td>";
                                echo "
              <td>" . $curso->getNombre() . "</td>";
              echo "
              <td>" . $info->get_descripcion() . "</td>";
              echo "
              <td>" . $info->get_fecha_inicio() . "</td>";
              echo "
              <td>" . $info->get_fecha_fin() . "</td>";
              echo "<td><a href='listarEstudiantesPorCurso.php?idc=".$curso->get_id_curso()."'>Ver estudiantes</a></td>";
              echo "<td><a href='agregarEstudianteCurso.php?idc=".$curso->get_id_curso()."'>Agregar estudiante</a></td>";

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
</body>
</html>
<?php }
?>
