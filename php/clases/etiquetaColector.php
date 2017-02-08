<?php

include_once('colector.php');
include_once ('etiqueta.php');
class EtiquetaColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }
    public function getAll(){
      $query="call getAllEtiquetas";
      return $this->worker->execQueryArray($query,Etiqueta::class);
    }
    
    public function getEtiquetaById($id){
      $query= "call getEtiquetaById($id)";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Etiqueta'); //count(array)(?)

        return $data;
      }
      return NULL;
    }

	public function addEtiqueta($nombre)
	{
		$info = new Etiqueta(null,$nombre);
		$query= "call addEtiqueta(\"$nombre\")";
		$result=$this->worker->query($query);
		if($result!==null){
      $lastid=$this->worker->query("SELECT LAST_INSERT_ID()");
			return $this->getEtiquetaById($lastid);
		}
		return null;
	}

  public function deleteEtiqueta($id){
    $query="call deleteEtiqueta($id)";
    $result=$this->worker->query($query);
    if($result!==null){
      return true;
    }
    else{
      return false;
    }
  }
  public function updateEtiqueta($id,$nombre)
  {
    $query="call updateEtiqueta($id,\"$nombre\")";
    $result=$this->worker->query($query);
    return $result!==null;
  }

}


 ?>
