<?php
session_start();
if (!(isset($_SESSION["rol"])) || $_SESSION["rol"] != 0) {
    header("location: /");
}
include_once("../php/clases/facturaColector.php");
include_once("../php/clases/detalleFacturaColector.php");
include_once("../php/clases/pagoColector.php");
include_once ('../php/clases/usuarioColector.php');
include_once ('../php/clases/cursoColector.php');

if (isset($_GET("id_estudiante")) && isset($_))
  $colector_usuario= new usuarioColector();
  $factura= $colector_usuario->realizarPagoDeposito();
 ?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Learning & Winening</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">

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
                        <li ><a href="">Cursos</a></li>
                        <li><a href="acerca_de.html">Acerca de</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar curso">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glypicon glyphicon-search"></span></button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
		<div class="container">
<div class="well">
  Realiza tu depósito en la cuenta #2345456456345 del Banco del Pichincha y envía tu correo a ventas@e-voicemarketing.com
  Procesaremos tu depósito y te avisaremos del pago exitoso.
</div>
</div>
<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <tr>
      <th>Número de factura</th>
   </tr>
   <tr>
     <th><?php echo $factura->get_numero_factura(); ?></th>
   </tr>
    <tr>
      <th>Nombre</th>
   </tr>
   <tr>
     <th><?php echo $factura->get_nombres()." ".$factura->get_apellidos(); ?></th>
   </tr>
   <tr>
     <th>RUC</th>
  </tr>
  <tr>
    <th><?php echo $factura->get_ruc(); ?></th>
  </tr>
   <tr><th>Total</th></tr>
   <tr>
      <th><?php echo $factura->get_total(); ?></th>
  </tr>
  <tr><th>Dirección</th></tr>
  <tr>
    <th><?php echo $factura->get_direccion(); ?></th>
  </tr>
  <tr>
    <th>Fecha</th>
  </tr>
  <tr>
   <th><?php echo $factura->get_fecha(); ?></th>
  </tr>
  </table>
</div>
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
    <script type="text/javascript"> function validar(){
        $.ajax("")
    }</script>

		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
