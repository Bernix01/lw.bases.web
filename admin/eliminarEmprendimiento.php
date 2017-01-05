<?php
session_start();
  include_once("../php/clases/emprendimientoColector.php");
 if(isset($_GET["id_emprendimiento"]) && isset($_SESSION["rol"])&& $_SESSION["rol"]===2){
   $id=$_GET["emprendimiento"];
   $id=stripslashes($id);
   $empColector= new EmprendimientoColector();
   if($empColector->deleteEmprendimiento($id)){
     ?>
     <script type="text/javascript">
      alert("Emprendimiento eliminado con éxito");
     </script>
     <?php
      header("location: listarEmprendimientos.php");
   }
 }
 header("location: listarEmprendimientos.php");
