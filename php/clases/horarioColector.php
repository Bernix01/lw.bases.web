<?php
include_once('colector.php');
include_once ('horario.php');
class HorarioColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getHorarioById($id){

      return $this->worker->getById($id,"horario","id_horario",Horario::class);
    }

  	public function addHorario($inicio,$fin)
  	{
  		$query= "INSERT INTO horario(inicio,fin) VALUES (\"$inicio\",\"$fin\")";
  		$result=$this->worker->execQuery($query);
  		if($result!==null){
        $id_horario=$this->worker->getLastID();
  			return $this->getHorarioById($id_horario);
  		}
  		return null;
  	}


    public function deleteHorario($id)
    {
      $query="DELETE FROM horario WHERE id_horario=$id";
      $result=$this->worker->query($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
    public function updateHorario($id,$inicio,$fin)
    {
      $query="UPDATE horario SET inicio=$inicio, fin=$fin WHERE id_horario=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }

    public function setCurso($id_horario,Curso $curso){
        $query= "INSERT INTO curso_horario(id_curso,id_horario) VALUES (".$curso->get_id_curso().",$id_horario)";
        $result=$this->worker->execQuery($query);
        return $result;
    }
  }

