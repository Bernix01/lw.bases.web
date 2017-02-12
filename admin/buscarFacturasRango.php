<?php
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /");
    exit();
  }
include_once("../php/clases/facturaColector.php");
$factura_colector= new FacturaColector();
if(isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])){
  $fecha_inicio = strtotime($_POST["fecha_inicio"]);
  $fecha_inicio = date('Y-m-d',$fecha_inicio);
  $fecha_fin = strtotime($_POST["fecha_fin"]);
  $fecha_fin = date('Y-m-d',$fecha_fin);
  $facturas=$factura_colector->getFacturasByRange($fecha_inicio,$fecha_fin);
}
?>
