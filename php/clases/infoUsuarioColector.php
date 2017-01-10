<?php
include_once('colector.php');
include_once ('infoUsuario.php');
class InfoUsuarioColector{
    private $worker=NULL;

    public function __construct(){
		$this->worker= new Colector();
    }

    public function getInfoUsuarioById($id_usuario){
		$query= "SELECT * FROM info_usuario WHERE id_usuario=\"".$id_usuario."\" limit 1";
		$result=$this->worker->execQueryReturning($query,Info_usuario::class);
        return $result;
    }


    public function addInfoUsuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
		$info=new Info_usuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line);
		$query="INSERT INTO info_usuario(id_usuario,nombres,apellidos,numero_cursos,tag_line) VALUES (\"$id_usuario\",\"$nombres\",\"$apellidos\",$numero_cursos,\"$tag_line\")";
		echo $query;
		$result=$this->worker->execQuery($query);
		if($result!==null){
			return $this->getInfoUsuarioById($id_usuario);
		}
		return null;
    }

    public function updateInfoUsuario($id_usuario,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
      $query="UPDATE info_usuario SET nombres=\"$nombres\", apellidos=\"$apellidos\", numero_cursos=$numero_cursos, tag_line=\"$tag_line\" WHERE id_usuario=\"$id_usuario\"";
      $result=$this->worker->execQuery($query);
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
