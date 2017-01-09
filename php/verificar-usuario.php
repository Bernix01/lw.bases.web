<?php
include_once ('clases/usuarioColector.php');
if(!isset($_POST)){
  die("dumbass!");
}
session_start();
$usuarioColector=new UsuarioColector();
// Define $username and $password
echo "hola";
$username=$_POST['nickname'];
$password=$_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

$usuario=$usuarioColector->getUserByCredentials($username,$password); //buscar en la base de datos al usuario por sus credenciales

if($usuario!== NULL){ //hizo match con el nickname y la contraseña

  $_SESSION["nickname"]=$usuario->get_nickname();
  $_SESSION["rol"]=$usuario->get_rol();
  if($usuario->get_rol()==2){
    (header("location: ../admin/")) ;
    die();
  }
  (header("location: /")) ;
  die();
}
//if(strcmp($username,"John")== 0 && strcmp($password,"12345")== 0){
//  $_SESSION["nickname"]=$username;
//
//  (header("location: /")) ;
//  die();
//}
//if(strcmp($username,"mabe")== 0 && strcmp($password,"12345")== 0){
//  $_SESSION["nickname"]=$username;
//  $_SESSION["admin"]=2;
//
//  (header("location: /admin/")) ;
//  die();
//}
//echo "dfghjk";
(header("location: ../html/login.html?success=0")) ;



?>
