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
            $data=mysqli_fetch_object($result,'Info_usuario'); //count(array)(?)

            return $data;
        }
        return NULL;
    }


    public function addInfoUsuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
      $info=new Info_usuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line);
      $query="INSERT INTO info_usuario(id_usuario,nombres,apellidos,numero_cursos,tag_line) VALUES ($id_usuario,\"$nombres\",\"$apellidos\",$numero_cursos,\"$tag_line\")";
      $result=$this->worker->query($query);
      if($result!==null){
        return $this->getInfoUsuarioById($id_usuario);
      }
      return null;
    }

    public function updateInfoUsuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
      $query="UPDATE info_usuario SET nombres=\"$nombres\", apellidos=\"$apellidos\", numero_cursos=$numero_cursos, tag_line=\"$tag_line\" WHERE id_usuario=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteInfoUsuario($id){
      $query="DELETE FROM info_usuario WHERE id_usuario=$id";
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
