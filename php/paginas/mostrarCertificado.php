<?php
include_once("../clases/certificadoColector.php");
session_start();

  if(!isset($_SESSION["rol"]) || !isset($_GET["path"])){
    header("location: /");
  }
  $colector= new CertificadoColector();
  //$result = $colector->getAll();
$file = "../../certificados/".$_GET["path"].".pdf";
$filename = $_GET["path"].".pdf"; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);


?>
