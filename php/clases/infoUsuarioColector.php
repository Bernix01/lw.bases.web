<?php
include_once('colector.php');
include_once ('infoUsuario.php');
class InfoUsuarioColector{
    private $worker=NULL;

    public function __construct(){
		$this->worker= new Colector();
    }

    public function getInfoUsuarioById($id_usuario){
		$query= "call getInfoUsuarioById(\"$id_usuario\")";
		$result=$this->worker->execQueryReturning($query,Info_usuario::class);
    return $result;
    }


    public function addInfoUsuario($id,$nombres,$apellidos,$numero_cursos,$tag_line)
    {
      if($numero_cursos==null){
        $numero_cursos=0;
      }
		$query="call addInfoUsuario(\"$id\",\"$nombres\",\"$apellidos\",\"$tag_line\",$numero_cursos)";
    echo $query;
    $result=$this->worker->execQuery($query);
		return $result;
    }

    public function updateInfoUsuario($id,$nombres,$apellidos,$tag_line=null,$numero_cursos)
    {
      $query="call updateInfoUsuario(\"$id\",\"$nombres\",\"$apellidos\",\"$tag_line\",$numero_cursos)";
      $result=$this->worker->execQuery($query);
      return $result;
    }
    public function deleteInfoUsuario($id){
      $query="call deleteInfoUsuario($id)";
      $result=$this->worker->execQuery($query);
      return $result;
    }
  }
?>
