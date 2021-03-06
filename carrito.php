<?php
session_start();
include_once("php/clases/cursoColector.php");
if(!isset($_SESSION["carro"])){
  $_SESSION["carro"] = array();
}
$carro = $_SESSION["carro"];

if(isset($_GET)){
  if(isset($_GET["add"])){
    $carro[$_GET["add"]] = 1;

  }
  if(isset($_GET["rem"])){
    if(isset($carro[$_GET["rem"]])){
      unset($carro[$_GET["rem"]]);
    }
  }
}
if(sizeof($carro)==0){
  header("location: /");
  die();
}
$curso_colector= new CursoColector();
$list = array();
foreach ($carro as $key => $value) {
    array_push($list, $key);
}
$cursos=array();
foreach ($list as $id) {
  $curso=$curso_colector->getCursoAndInfoById($id);
  array_push($cursos,$curso);

}
$_SESSION["carro"]=$carro;
/*foreach ($_SESSION["carro"] as $key => $value) {
  echo $key." ". $value;
}*/
//key is the id of the course; and value is the quantity


 ?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Learning & Winening</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
<?php include("php/paginas/menu.php"); ?>
    	<div class="container">
      <h1>Shopping Cart</h1>

<div class="shopping-cart" >

  <div class="column-labels">
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <?php
  $total = 0;
  foreach($cursos as $row) {
    $total+=$row->costo*$carro[$row->id_curso];
  echo "<div class=\"product\">
    <div class=\"product-details\">
      <div class=\"product-title\">".$row->nombre."</div>
      <p class=\"product-description\">".$row->descripcion."</p>
    </div>
    <div class=\"product-price\">".$row->costo."</div>
    <div class=\"product-removal\">
      <a href=\"carrito.php?rem=".$row->id_curso."\" class=\"remove-product\">
        Remove
      </a>
    </div>
    <div class=\"product-line-price\">".$row->costo."</div>
  </div>
";
}?>
  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"><?php echo $total; ?></div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Total</label>
      <div class="totals-value" id="cart-total"><?php echo $total; ?></div>
    </div>
  </div>
      <a href="deposito.php"  class="checkout" onclick="validar()">Pago con depósito</a>
</div>
<div>
  <a href="pago.php" class="checkout" onclick="validar()">Pagar con tarjeta</a>
</div>
		</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/adjax/jquery.validate/1.13.0/additional-methods.min.js"></script>
    <script type="text/javascript"> function validar(){

    }</script>

		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
