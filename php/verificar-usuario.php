<?php
// Define $username and $password
echo "hola";
$username=$_POST['nickname'];
$password=$_POST['password'];
// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);
if(strcmp($username,"John")== 0 && strcmp($password,"12345")== 0){
  $_SESSION["nickname"]=$username;

  (header("location: /")) ;
  die();
}
if(strcmp($username,"mabe")== 0 && strcmp($password,"12345")== 0){
  $_SESSION["nickname"]=$username;
  $_SESSION["admin"]=2;

  (header("location: /admin/")) ;
  die();
}
echo "dfghjk";
(header("location: /login.html?success=0")) ;



?>
