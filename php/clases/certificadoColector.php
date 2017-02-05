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
    $query="SELECT * FROM certificado WHERE id_estudiante=$id";
    $result=$this->worker->query($query);
    if($result!==null){
      $certificados=array();
      while($data=mysqli_fetch_object($result,"Certificado")){
        array_push($certificados,$data);
      }
      return $certificados;
    }
    return null;
  }
  public function deleteCertificado($id){
    $query="DELETE FROM certificado WHERE id_certificado=$id";
    $result=$this->worker->query($query);
    if($result!==null){
      return true;
    }
    else{
      return false;
    }
  }
  public function updateCertificado($id,$id_estudiante,$contenido)
  {
    $query="UPDATE certificado SET id_estudiante=$id_estudiante, contenido=$contenido WHERE id_certificado= $id";
    $result=$this->worker->query($query);
    return $result!==null;
  }

}

?>
