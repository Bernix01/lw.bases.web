<?php
include_once('colector.php');
include_once ('certificado.php');
class certificadoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getCertificadoById($id_certificado){
      $query= "SELECT * FROM certificado WHERE id_certificado=".$id_certificado." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Certificado'); //count(array)(?)

        return $data;
      }
      return NULL;
    }
    
	public function addCertificado($id_certificado,$contenido,$id_usuario)
	{
		$info = new Certificado($id_certificado,$contenido,$id_usuario);
		$query= "INSERT INTO Certificado(id_certificado,contenido,id_usuario) VALUES ($id_certificado,\"$contenido\",\"$id_usuario\")";
		$result=$this->worker->query($query);
		if($result!==null){
			return $this->getCertificadoById($id_certificado);
		}
		return null;
	}
	
}

?>