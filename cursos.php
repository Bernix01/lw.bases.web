<?php
$HOST="localhost";
$USERNAME="root";
$PASSWORD="root";
$link = mysqli_connect($HOST, $USERNAME, $PASSWORD);
mysqli_set_charset($link,"utf8");
mysqli_select_db($link, "lw");
//if connection is not successful you will see text error
if (!$link) {
       die('Could not connect: ' . mysql_error());
}
$query='SELECT * from curso, info_curso where curso.id_curso = info_curso.id_curso';
$curso=mysqli_query($link,$query);
if(!$curso){
    die('Invalid query:'.mysqli_error($link));
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
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">Learning & Winening</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li ><a href="cursos.html">Cursos</a></li>
                        <li><a href="acerca_de.html">Acerca de</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar curso">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glypicon glyphicon-search"></span></button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="login.html">Identifícate</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
		<div class="container">
			<div class="row">

          <?php while($row=mysqli_fetch_assoc($curso)) {
          echo "<div class=\"col-sm-2 col-md-4 col-lg-4\"><div class=\"curso\">
					<h3>".$row["nombre"]."</h3>
					<span class=\"pull-right\">
					<span class=\"label label-info\">$".$row["costo"]."</span>
					<span class=\"label label-success\"><i class=\"fa fa-person\"></i> ".$row["cupos_disponibles"]."/".$row["cupo_max"]."</span></span>
					<br>
					<hr>
					<p>".$row["descripcion"]."</p>
					<a href=\"carrito.php?add=".$row["id_curso"]."\" type=\"button\" class=\"btn btn-success btn-sm\">Comprar</a>

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
