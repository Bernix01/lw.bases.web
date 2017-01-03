<?php
include_once('colector.php');
include_once ('usuario.php');
  class usuarioColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getUserById($id){
      $query= "SELECT * FROM usuario WHERE id_usuario=".$id." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc(); //count(array)(?)
        $usuario = new Usuario();
        $usuario->set_id_usuario($data['id_usuario']);
        $usuario->setNickname($data['nickname']);
        $usuario->setContrasenia($data['contrasenia']);
        $usuario->setEmail($data['email']);
        $usuario->setLastLogin($data['last_login']);
        $usuario->setRol($data['rol']);
        return $usuario;
      }
      return NULL;
    }
    public function getUserByCredentials ($nickname,$contrasenia){
      $query= "SELECT * FROM usuario WHERE nickname='".$nickname."'AND contrasenia='".$contrasenia."'";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc($result); //count(array)(?)
        $usuario = new Usuario();
        $usuario->set_id_usuario($data['id_usuario']);
        $usuario->setNickname($data['nickname']);
        $usuario->setContrasenia($data['contrasenia']);
        $usuario->setEmail($data['email']);
        $usuario->setLastLogin($data['last_login']);
        $usuario->setRol($data['rol']);
        return $usuario;
      }
      return NULL;
    }

    public function deleteUsuario($id_usuario){
      $query="DELETE FROM usuario WHERE usuario.id_usuario=$id_usuario";
      $result=$this->worker->query($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
    public function updateUsuario($id,$nickname,$contrasenia,$email,$rol){
      $query= "UPDATE usuario SET nickname=$nickname, contrasenia=$contrasenia, rol=$rol, email=$email WHERE id_usuario=$id";
      $result=$this->worker->query($query);
      return result!==null;
    }
  }
?>
