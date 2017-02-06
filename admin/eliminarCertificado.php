<?php
session_start();
include_once("../php/clases/certificadoColector.php");
if(isset($_GET["id_certificado"]) && isset($_SESSION["rol"])&& $_SESSION["rol"]==2){
   $id=$_GET["id_certificado"];
   $id=stripslashes($id);
   $certificado_colector= new CertificadoColector();
   if($certificado_colector->deleteCertificado($id)){
     ?>
     <script type="text/javascript">
      alert("Certificado eliminado con éxito");
     </script>
     <?php
      header("location: listarCertificados.php");
   }
 }
 header("location: listarCertificados.php");
