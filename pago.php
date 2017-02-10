<?php
require_once("php/clases/FacturaColector.php")
session_start();
if(!isset($_SESSION["rol"])){
  header("location: /");
}
if(isset($_SESSION["carro"])){
  if(isset($_POST["nombres-tarjeta"]) && isset($_POST["apellidos-tarjeta"]) && isset($_POST["num_tarjeta"])&& isset($_POST["expire"])&& isset($_POST["ccv"])&& isset($_POST["nombres"])&& isset($_POST["apellidos"])&& isset($_POST["direccion"])&& isset($_POST["ruc"])){
    $factura_colector= new FacturaColector();
    $carro=$_SESSION["carro"];
    $list = array();
    foreach ($carro as $key => $value) {
        array_push($list, $key);
    }
    if($factura_colector->comprarCursos()){
      
    }
  }
}

 ?>
<html>

<head>
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #3e5871;
        }

        .mdl-card {
            margin-top: 40px;
            margin-left: auto;
            margin-bottom: 40px;
            margin-right: auto;
        }

        .mdl-card-order>.mdl-card__title {
            color: #fff;
            padding-top: 40px;
            padding-bottom: 40px;
            background: #2c3e50;
            /*
  background: #3F51B5 url("images/mastercard.jpg") center;
  background-size: cover;
  */
        }
    </style>
</head>

<body>

    <div class="mdl-card mdl-card-order mdl-shadow--8dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Pago</h2>
        </div>
        <div class="mdl-card__supporting-text mdl-grid">
            <form name="formulario-pago" >
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name= "nombres-tarjeta" id="nombres-tarjeta" required='required' minlength="2" maxlength="46" placeholder="Nombres" />
                    <label class="mdl-textfield__label" for="cardholder">Nombres</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name= "apellidos-tarjeta"id="apellidos-tarjeta" minlength="2" maxlength="46"required='required' placeholder="Apellidos" />
                    <label class="mdl-textfield__label" for="cardholder">Apellidos</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name="num_tarjeta" id="num_tarjeta" placeholder="XXXX XXXX XXXX XXXX" pattern="-?[0-9]*(\.[0-9]+)?" minlength="16" maxlength="16" required='required' />
                    <label class="mdl-textfield__label" for="cardnumber">XXXX XXXX XXXX XXXX</label>
                    <span class="mdl-textfield__error">Solo números!</span>
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="text" name="expire" id="expire" placeholder="MM / YY" pattern="^(0[1-9]|1[1-2])\/[0-9]{2}\b" maxlength="5" required='required'/>
                        <label class="mdl-textfield__label" for="expire">MM / YY</label>
                        <span class="mdl-textfield__error">Formato incorrecto!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="text" name= "ccv" id="ccv" placeholder="CCV" pattern="-?[0-9]*(\.[0-9]+)?" required='required' minlength="3" maxlength="3" />
                        <label class="mdl-textfield__label" for="ccv">CCV</label>
                        <span class="mdl-textfield__error">Solo números!</span>
                    </div>
                </div>
                <hr>

                <h2 class="mdl-card__title-text">Datos de facturación</h2>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name= "nombres" id="nombres" required='required' minlength="2" maxlength="46" placeholder="Nombre" />
                    <label class="mdl-textfield__label" for="nholder">Nombres</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name="apellidos" id="apellidos" required='required' minlength="2" maxlength="46" placeholder="Apellidos" />
                    <label class="mdl-textfield__label" for="nholder">Apellidos</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name="direccion" id="direccion" required='required' minlength="10" maxlength="64" placeholder="Dirección" />
                    <label class="mdl-textfield__label" for="dirholder">Dirección</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name="ruc" id="ruc" required='required' minlength="13" maxlength="13" placeholder="RUC" />
                    <label class="mdl-textfield__label" for="dirholder">RUC</label>
                </div>
                <!--<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" name= "telefono" id="telefono" required='required' pattern="-?[0-9]*(\.[0-9]+)?" placeholder="Teléfono" />
                    <label class="mdl-textfield__label" for="phonholder">Teléfono</label>
                </div>-->
                <div class="mdl-card__actions mdl-cell--12-col send-button">
                    <button  class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored" id="send">
						Completar transacción
					</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    		<script src="js/jquery.js"></script>
    		<script src="js/jquery.validate.min.js"></script>
    	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/adjax/jquery.validate/1.13.0/additional-methods.min.js"></script>
    		<script src="js/pagovalidation.js"></script>
    <script type="text/javascript">$('.message a').click(function(){
       $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });</script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

    		<!-- Bootstrap JavaScript -->
    		<script src="js/bootstrap.min.js"></script>
    		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     		<script src="Hello World"></script>
</body>

</html>
