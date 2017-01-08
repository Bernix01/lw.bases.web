<?php
include_once('colector.php');
include_once ('certificado.php');
class CertificadoColector{
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

	public function addCertificado($contenido,$id_usuario)
	{
		$info = new Certificado(null,$contenido,$id_usuario);
		$query= "INSERT INTO Certificado(contenido,id_usuario) VALUES (\"$contenido\",\"$id_usuario\")";
		$result=$this->worker->query($query);
		if($result!==null){
      $lastid=$this->worker->query("SELECT LAST_INSERT_ID()");
			return $this->getCertificadoById($lastid);
		}
		return null;
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
