<?php

include_once('colector.php');
include_once ('etiqueta.php');
class EtiquetaColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getEtiquetaById($id){
      $query= "SELECT * FROM etiqueta WHERE id_etiqueta=".$id." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Etiqueta'); //count(array)(?)

        return $data;
      }
      return NULL;
    }

	public function addEtiqueta($nombre)
	{
		$info = new Certificado(null,$nombre);
		$query= "INSERT INTO Certificado(nombre) VALUES (\"$nombre\")";
		$result=$this->worker->query($query);
		if($result!==null){
      $lastid=$this->worker->query("SELECT LAST_INSERT_ID()");
			return $this->getEtiquetaById($lastid);
		}
		return null;
	}

  public function deleteEtiqueta($id){
    $query="DELETE FROM etiqueta WHERE id_etiqueta=$id";
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
    $query="UPDATE etiqueta SET nombre=$nombre WHERE id_etiqueta= $id";
    $result=$this->worker->query($query);
    return $result!==null;
  }

}


 ?>
