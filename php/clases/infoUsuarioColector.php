<?php
include_once('colector.php');
include_once ('infoUsuario.php');
  class usuarioColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getInfo_usuarioById($id){
      $query= "SELECT * FROM info_usuario WHERE id_usuario=".$id." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc(); //count(array)(?)
        $info = new InfoUsuario();
        $info->set_id_usuario($data['id_usuario']);
        $info->setNickname($data['nombres']);
        $info->setContrasenia($data['apellidos']);
        $info->setEmail($data['numero_cursos']);
        $info->setLastLogin($data['tag_line']);
        return $info;
      }
      return NULL;
    }

    public function updateInfoUsuario($id,$nombres,$apellidos,$numero_cursos,$tag_line){
      $query= "UPDATE info_usuario SET nombres=$nombres, apellidos=$apellidos, numero_cursos=$numero_cursos, tag_line=$tag_line WHERE id_usuario=$id";
      $result=$this->worker->query($query);
      return result!==null;
    }
  }
?>
