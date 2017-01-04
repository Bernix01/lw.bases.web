<?php
  class Usuario{
    private $id_usuario;
    private $nickname;
    private $contrasenia;
    private $email;
    private $last_login;
    private $rol;


    public function __construct($id_usuario=null,$nickname=null,$contrasenia=null,$email=null,$last_login=null,$rol=null){
      if($id_usuario!==null){
        $this->id_usuario=$id_usuario;
      }
      if($nickname!==null){
        $this->nickname=$nickname;
      }
      if($contrasenia!==null){
        $this->contrasenia=$contrasenia;
      }
      if($email!==null){
        $this->email=$email;
      }
      if($last_login!==null){
        $this->last_login=$last_login;
      }
      if($rol!==null){
        $this->rol=$rol;
      }

    }


    public function get_id_usuario(){
      return $this->id_usuario;
    }
    public function set_id_usuario($id){
      $this->id_usuario=$id;
    }
    public function setNickname($nickname){
      $this->nickname=$nickname;
    }
    public function getNickname(){
      return $this->nickname;
    }
    public function setContrasenia($contrasenia){
      $this->contrasenia=$contrasenia;
    }
    public function getContrasenia(){
      return $this->contrasenia;
    }
    public function setEmail($email){
      $this->email=$email;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setLastLogin($lastLogin){
      $this->lastLogin=$lastLogin;
    }
    public function getLastLogin(){
      return $this->last_login;
    }
    public function setRol($rol){
      $this->rol=$rol;
    }
    public function getRol(){
      return $this->rol;
    }

    //getter y setter de info_usuario


  }

?>
