<?php
include_once('colector.php');
include_once ('infoUsuario.php');
  class InfoUsuarioColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getInfoUsuarioById($id_usuario){
      $query= "SELECT * FROM info_usuario WHERE id_usuario=".$id_usuario." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc(); //count(array)(?)
        $info = new Info_usuario();
        $info->set_id_usuario($data['id_usuario']);
        $info->set_nombres($data['nombres']);
        $info->set_apellidos($data['apellidos']);
        $info->set_numero_cursos($data['numero_cursos']);
        $info->set_tag_line($data['tag_line']);
        return $info;
      }
      return NULL;
    }


    public function addInfoUsuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
      $info=new Info_usuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line);
      $query="INSERT INTO info_usuario(id_usuario,nombres,apellidos,numero_cursos,tag_line) VALUES ($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)";
      $result=$this->worker->query($query);
      if($result!==null){
        return $info;
      }
      return null;
    }

    public public function updateinfo($id,$id_usuario,$nombres,$apellidos)
    {
      $query="UPDATE info SET nombres=$nombres, apellidos=$apellidos WHERE numero_cursos=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteinfo($id){
      $query="DELETE FROM info WHERE numero_cursos=$id";
      $result=$this->worker->query($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
  }
?>
