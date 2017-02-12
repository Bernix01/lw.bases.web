<?php
ini_set("display_errors", 1);
include_once("../clases/usuarioColector.php");
include_once("../clases/infoUsuarioColector.php");

$usuario_colector = new UsuarioColector();
$info_usuariocolector = new InfoUsuarioColector();


if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST['contrasenia']) && isset($_POST['cedula']) && isset($_POST['rol'])) {
    $resultado1 = $usuario_colector->addUsuario($_POST["cedula"],$_POST["nickname"],$_POST["contrasenia"],$_POST["email"],$_POST["rol"]);
    if ($resultado1!= NULL) {
      $user=$usuario_colector->getUserByPosition($resultado1->id);
       if(isset($_POST["tag_line"])){

        $resultado2 = $info_usuariocolector->addInfoUsuario($user->get_id_usuario(),$_POST["nombres"],$_POST["apellidos"],0,$_POST["tag_line"]);
      }else{
        $resultado2 = $info_usuariocolector->addInfoUsuario($user->get_id_usuario(),$_POST["nombres"],$_POST["apellidos"],0,null);
      }
      if ($resultado2) {?>

        <script type="text/javascript">
         alert("Cuenta creada exitósamente");
        </script>
          <?php
      } else { ?>
        <script type="text/javascript">
         alert("No se pudo crear su cuenta");
        </script>
          <?php
      }
    }?>
    <script type="text/javascript">
     alert("No se pudo crear su cuenta");
    </script> <?php

}
header("location: ../../")
    ?>
