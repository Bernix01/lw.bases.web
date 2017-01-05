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
    public function set_nickname($nickname){
      $this->nickname=$nickname;
    }
    public function get_nickname(){
      return $this->nickname;
    }
    public function set_contrasenia($contrasenia){
      $this->contrasenia=$contrasenia;
    }
    public function get_contrasenia(){
      return $this->contrasenia;
    }
    public function set_email($email){
      $this->email=$email;
    }
    public function get_email(){
      return $this->email;
    }
    public function set_last_login($lastLogin){
      $this->last_login=$lastLogin;
    }
    public function get_last_login(){
      return $this->last_login;
    }
    public function set_rol($rol){
      $this->rol=$rol;
    }
    public function get_rol(){
      return $this->rol;
    }


  }

?>
