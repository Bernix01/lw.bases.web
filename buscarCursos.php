<?php
include_once('php/colector.php');
session_start();
$colector= new Colector();
//mysqli_set_charset($link,"utf8");
//mysqli_select_db($link, "lw");
//if connection is not successful you will see text error
/*if (!$link) {
       //die('Could not connect: ' . mysql_error());
}*/
$busqueda=$_POST['busqueda'];
$busqueda=stripslashes($busqueda);
$query="SELECT curso.nombre as cnombre, curso.id_curso as idcurso, info_curso.descripcion as descripcion,curso.costo as costo, info_curso.cupo_max as cupo_max, info_curso.cupos_disponibles as disponibles from curso, info_curso, curso_etiqueta, etiqueta where idcurso= info_curso.id_curso AND curso_etiqueta.id_curso=idcurso AND curso_etiqueta.id_etiqueta=etiqueta.id_etiqueta AND descripcion LIKE '".$busqueda."' OR etiqueta.nombre LIKE '".$busqueda."' OR cnombre LIKE '".$busqueda."' GROUP BY idcurso";
$curso=$colector->query($query);
if(!$curso){
    die('Invalid query:');
}
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Learning & Winening</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include("php/menu.php"); ?>
		<div class="container">
			<div class="row">

          <?php while($row=mysqli_fetch_assoc($curso)) {
          echo "<div class=\"col-sm-2 col-md-4 col-lg-4\"><div class=\"curso\">
					<h3>".$row["cnombre"]."</h3>
					<span class=\"pull-right\">
					<span class=\"label label-info\">$".$row["costo"]."</span>
					<span class=\"label label-success\"><i class=\"fa fa-person\"></i> ".$row["disponibles"]."/".$row["cupo_max"]."</span></span>
					<br>
					<hr>
					<p>".$row["descripcion"]."</p>
					<a href=\"carrito.php?add=".$row["idcurso"]."\" type=\"button\" class=\"btn btn-success btn-sm\">Comprar</a>

				</div></div>";
      }
      ?>
				</div>
			</div>
		</div>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
