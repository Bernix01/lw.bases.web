<?php
include_once('php/clases/colector.php');
session_start();
$colector= new Colector();
//mysqli_set_charset($link,"utf8");
//mysqli_select_db($link, "lw");
//if connection is not successful you will see text error
/*if (!$link) {
       //die('Could not connect: ' . mysql_error());
}*/
$query='SELECT * from curso, info_curso where curso.id_curso = info_curso.id_curso';
$curso=$colector->execQueryArray($query);
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

    <?php include("php/paginas/menu.php");?>
		<div class="container">
			<div class="row">

          <?php foreach($curso as $row) {
          echo "<div class=\"col-sm-2 col-md-4 col-lg-4\"><div class=\"curso\">
					<h3>".$row->nombre."</h3>
					<span class=\"pull-right\">
					<span class=\"label label-info\">$".$row->costo."</span>
					<span class=\"label label-success\"><i class=\"fa fa-person\"></i> ".$row->cupos_disponibles."/".$row->cupo_max."</span></span>
					<br>
					<hr>
					<p>".$row->descripcion."</p>
					<a href=\"carrito.php?add=".$row->id_curso."\" type=\"button\" class=\"btn btn-success btn-sm\">Comprar</a>

				</div></div>";
      }
      ?>
				</div>
			</div>
		</div><!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
