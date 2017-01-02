<?php
session_start();
if(!isset($_SESSION["carro"])){
  $_SESSION["carro"] = array();
}
$carro = $_SESSION["carro"];
if(isset($_GET)){
  if(isset($_GET["add"])){

     if(isset($carro[$_GET["add"]])){
       $carro[$_GET["add"]]++;

     }else{
       $carro[$_GET["add"]] = 1;
     }
  }
  if(isset($_GET["rem"])){
    if(isset($carro[$_GET["rem"]])){
      unset($carro[$_GET["rem"]]);
    }
  }
}
if(sizeof($carro)==0){
  header("location: paginas/");
  die();
}
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
$list = "";
foreach ($carro as $key => $value) {
  $list = $list.$key.',';
}
$list = substr($list,0,strlen($list)-1);
$query='SELECT * from curso, info_curso where curso.id_curso = info_curso.id_curso AND curso.id_curso IN ('.$list.')';

$curso=mysqli_query($link,$query);
if(!$curso){
    die('Invalid query:'.mysqli_error($link));
}
$_SESSION["carro"]=$carro;
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
<?php include("paginas/menu.php"); ?>
    	<div class="container">
      <h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <?php
  $total = 0;
  while($row=mysqli_fetch_assoc($curso)) {
    $total+=$row["costo"]*$carro[$row["id_curso"]];
  echo "<div class=\"product\">
    <div class=\"product-image\">
      <img src=\"\">
    </div>
    <div class=\"product-details\">
      <div class=\"product-title\">".$row["nombre"]."</div>
      <p class=\"product-description\">".$row["descripcion"]."</p>
    </div>
    <div class=\"product-price\">".$row["costo"]."</div>
    <div class=\"product-quantity\">
      <input type=\"number\" value=\"".$carro[$row["id_curso"]]."\" min=\"1\">
    </div>
    <div class=\"product-removal\">
      <a href=\"carrito.php?rem=".$row["id_curso"]."\" class=\"remove-product\">
        Remove
      </a>
    </div>
    <div class=\"product-line-price\">".($row["costo"]*$carro[$row["id_curso"]])."</div>
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

      <a href="../html/pago-opciones.html" class="checkout" onclick="validar()">Checkout</a>

</div>
		</div>
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
    <script type="text/javascript"> function validar(){

    }</script>

		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
