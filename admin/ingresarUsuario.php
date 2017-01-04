<?php
ini_set("display_errors", 1);
include_once("../php/clases/usuarioColector.php");

$usuario_colector = new UsuarioColector();
session_start();
if (!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2) {
    header("location: /login.html");
    die();
}

//if connection is not successful you will see text error
if ($usuario_colector === null) {
    die('Could not connect: ' . mysql_error());
}
if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['contrasenia']) && isset($_POST['rol']) ) {
    $usuario= new Usuario(null,$_POST['nickname'],$_POST['contrasenia'],$_POST['email'],null,$$_POST['rol']);
    $resultado1 = $usuario_colector->addUsuario($usuario);     //inserto el usuario

    if(isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["tag_line"])){
      //obtener el último id en la tabla de usuario, y agregarlo al campo id_usuario de info_usuario
      $info_usuario=new InfoUsuario($_POST["nombres"],$_POST["apellidos"],$_POST["tag_line"]);
      $resultado2 = $usuario_colector->addUsuario($usuario);      //inserto la información de ese usuario
      if($resultado2!==null){
      (header("location: listarUsuarios.php?su=1&sinfo=1")) ;
      }
      else{
        header("location: listarUsuarios.php?su=1&sinfo=0")) ;
      }
    }
    if($resultado1!==null){
      (header("location: .listarUsuarios.php?su=1&sinfo=0")) ;
    }
    (header("location: .listarUsuarios.php?su=0&sinfo=0")) ;
  }

?>
