<?php
include_once('colector.php');
include_once ('certificado.php');
class CertificadoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getAll(){
      $query="call listarCertificados";
      $result=$this->worker->execQueryArray($query,Certificado::class);
      return $result;
    }
    public function getCertificadoById($id_certificado){
      $query= "call getCertificadoById($id_certificado)";
      $result=$this->worker->execQueryReturning($query,Certificado::class);
      return $result;
    }


	public function addCertificado($contenido,$id_estudiante)
	{

		$query= "call addCertificado(\"$contenido\",\"$id_estudiante\")";
		$result=$this->worker->execQuery($query);
		return $result;
	}
  public function getCertificadosByStudentId($id){
    $query="call getCertificadosByStudentId(\"$id\")";
    $result=$this->worker->execQueryArray($query,Certificado::class);
    $lista_certis=array();
    foreach($result as $certi){
      array_push($lista_certis,$certi);
    }
    return $lista_certis;

  }
  public function deleteCertificado($id){
    $query="call deleteCertificado($id)";
    $result=$this->worker->execQuery($query);
    return $result;
  }
  public function updateCertificado($id,$id_estudiante,$contenido)
  {
    $query="call updateCertificado($id,\"$id_estudiante\",\"$contenido\")";
    $result=$this->worker->execQuery($query);
    return $result;
  }

}

?>
