<?php
session_start();
  include_once("../php/clases/usuarioColector.php");
 if(isset($_GET["ius"]) && isset($_SESSION["rol"])&& $_SESSION["rol"]==2){
   $id=$_GET["ius"];
   $id=stripslashes($id);
   $usuarioColector= new UsuarioColector();
   if($usuarioColector->deleteUsuario($id)){
     ?>
     <script type="text/javascript">
      alert("Usuario eliminado con éxito");
     </script>
     <?php
      header("location: listarUsuarios.php");
   }
 }
 header("location: listarUsuarios.php");
