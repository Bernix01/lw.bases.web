<?php
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /");
    exit();
include_once("../php/clases/facturaColector.php");
$factura_colector= new FacturaColector();
if(isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])){
  $facturas=$factura_colector->getFacturasByRange($_POST["fecha_inicio"],$_POST["fecha_fin"]);
} ?>
