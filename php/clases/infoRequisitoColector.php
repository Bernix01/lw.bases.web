<?php
include_once('colector.php');
include_once ('infoRequisito.php');
class InfoRequisitoColector{
    private $worker=NULL;

    public function __construct(){
		$this->worker= new Colector();
    }

    public function getInfoRequisitoById($id_requisito){
        $query= "SELECT * FROM info_requisito WHERE id_requisito=".$id_requisito." limit 1";
        $result=$this->worker->query($query);
        if($result!==NULL){
            $data=mysqli_fetch_object($result,'Info_requisito'); //count(array)(?)
            return $data;
        }
        return NULL;
    }

    public function addInfoRequisito($id_requisito,$url_imagen,$descripcion)
	{
		$info = new Info_requisito($id_requisito,$url_imagen,$descripcion);
		$query= "INSERT INTO info_requisito(id_requisito,url_imagen,descripcion) VALUES ($id_requisito,\"$url_imagen\",\"$descripcion\")";
		$result=$this->worker->query($query);
		if($result!==null){
			return $this->getInfoRequisitoById($id_requisito);
		}
		return null;
	}
	
	 public function updateInfoRequisito($id_requisito,$url_imagen,$descripcion)
    {
		$query="UPDATE info_requisito SET url_imagen=\"$url_imagen\", descripcion=\"$descripcion\" WHERE id_requisito=$id_requisito";
		$result=$this->worker->query($query);
		return $result!==null;
    }
	
	public function deleteInfoRequisito($id_requisito){
		$query="DELETE FROM info_requisito WHERE id_requisito=$id_requisito";
		$result=$this->worker->query($query);
		if($result!==null){
			return true;
		}
		else{
			return false;
		}
    }
   
}
?>
