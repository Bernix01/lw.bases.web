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
      $result=$this->worker->execQueryReturning($query,Etiqueta::class);
      return $result;
      return NULL;
    }

	public function addEtiqueta($nombre)
	{
		$info = new Etiqueta(null,$nombre);
		$query= "call addEtiqueta(\"$nombre\")";
		$result=$this->worker->execQuery($query);
		return $return;
	}

  public function deleteEtiqueta($id){
    $query="call deleteEtiqueta($id)";
    $result=$this->worker->execQuery($query);
    return $result;
  }
  public function updateEtiqueta($id,$nombre)
  {
    $query="call updateEtiqueta($id,\"$nombre\")";
    $result=$this->worker->execQuery($query);
    return $result
  }

}


 ?>
