<!doctype html>
<?php
// Usage without mysql_list_dbs()
$link = mysql_connect('localhost', 'root', '');
$res = mysql_query("SHOW DATABASES");
$cont=0;
while ($row = mysql_fetch_assoc($res)) {
    $cont= $cont +1;
    //echo $row['Database'] . "\n";
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="eCommerceAssets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<div id="mainWrapper">
<header>
<!-- This is the header content. It contains Logo and links -->
<div id="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
  <!-- <img src="logo.png" alt="" width="130"> --> 
  <!-- Company Logo text --> 
  GABANIJO</div>
<div id="headerLinks"><a href="login.html" title="Login">Login/Registro</a>
  </header>
  <section id="offer"> <!-- The offer section displays a banner text for promotions --> 
    <!-- <center><img src="eCommerceAssets/images/banner.png" width=100%></center> --> 
  </section>
  <div id="content">
    <section class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->Ingresos </h2>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><a href="newCompra.html" title="Link">Compra</a></li>
            <li><a href="newVenta.html"  title="Link">Venta</a></li>
            <li><a href="newGuia.html"  title="Link">Guia de Remisión</a></li>
            <li><a href="rolPago.html"  title="Link">Rol de pago</a></li>
            <li><a href="newTrabajador.html"  title="Link">Trabajador</a></li>
          </ul>
        </nav>
        <nav class="menu" hidden>
          <h2>Consultas</h2>
          <!-- Title for menuset 2 -->
          <hr>
          <ul>
            <!--List of links under menuset 2 -->
            <li><a href="#" title="Link">Link 1</a></li>
            <li><a href="#" title="Link">Link 2</a></li>
            <li><a href="#" title="Link">Link 3</a></li>
            <li><a href="#" title="Link">Link 4</a></li>
          </ul>
        </nav>
      </div>
    </section>
    <section class="mainContent">
      <FORM action="http://algunsitio.com/prog/usuarionuevo" method="post">
        <P>
          <header>Login</header>
          <LABEL for="username">Usuario: </LABEL>
          <INPUT type="text" id="username" name="username" required>
          <BR>
          <LABEL for="password">Contraseña: </LABEL>
          <INPUT type="password" id="password" name="password" required maxlength="12">
          <BR>
          <br>
          <INPUT type="submit" value="Ingresar">
          <INPUT type="reset">
        </P>
      </FORM>
      <FORM action="http://algunsitio.com/prog/usuarionuevo" method="post">
        <header>Registro</header>
        <LABEL for="username">Usuario: </LABEL>
        <INPUT type="text" id="username" name="username" required>
        <BR>
        <LABEL for="password">Contraseña: </LABEL>
        <INPUT type="password" id="password" name="password" required>
        <BR>
        <LABEL for="nombre">Nombre:</LABEL>
        <INPUT type="text" id="nombre" name="nombre" maxlength="24" required>
        <BR>
        <LABEL for="apellido">Apellido: </LABEL>
        <INPUT type="text" id="apellido" name="apellido" maxlength="24" required>
        <BR>
        <LABEL for="cargo">Cargo: </LABEL>
        <select name="Cargo">
          <option value="Gerente">Gerente</option>
          <option value="Presidente">Presidente</option>
          <option value="Secretario">Secretario</option>
          <option value="Contador">Contador</option>
          <option value="Chofer">Chofer</option>
          <option value="Cuadrillero">Cuadrillero</option>
        </select>
        <BR>
        <br>
        <INPUT type="submit" value="Ingresar">
        <INPUT type="reset">
        </P>
      </FORM>
    </section>
  </div>
  <footer> 
    <!-- This is the footer with default 3 divs -->
    <p>El numero de bases de datos es: <?php echo $cont; ?> </p>
    <div hidden>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius sem neque. Integer ornare.</p>
    </div>
    <div hidden>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius sem neque. Integer ornare.</p>
    </div>
    <div class="footerlinks" hidden>
      <p><a href="#" title="Link">Link 1 </a></p>
      <p><a href="#" title="Link">Link 2</a></p>
      <p><a href="#" title="Link">Link 3</a></p>
    </div>
  </footer>
</div>
</body>
</html>
