<?php
include_once('colector.php');
include_once ('pago.php');
class HorarioColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getHorarioById($id){
      $query= "SELECT * FROM horario WHERE id_horario=".$id." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Horario'); //count(array)(?)

        return $data;
      }
      return NULL;
    }

  	public function addHorario($inicio,$fin)
  	{
  		$horario = new Horario($null,$inicio,$fin);
  		$query= "INSERT INTO horario(inicio,fin) VALUES ($inicio,$fin)";
  		$result=$this->worker->query($query);
  		if($result!==null){
        $id_horario=$this->worker->query("SELECT LAST_INSERT_ID()");
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
    public public function updateHorario($id,$inicio,$fin)
    {
      $query="UPDATE horario SET inicio=$inicio, fin=$fin WHERE id_horario=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }

  }
?>
