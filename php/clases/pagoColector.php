<?php
include_once('colector.php');
include_once ('pago.php');
class PagoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getPagoById($id_pago){
      $query= "SELECT * FROM pago WHERE id_pago=".$id_pago." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Pago'); //count(array)(?)

        return $data;
      }
      return NULL;
    }

  	public function addPagoTarjeta($id_pago,$forma_pago,$n_tarjeta)
  	{
  		$info = new Pago($id_pago,$forma_pago,null,$n_tarjeta,null);
  		$query= "INSERT INTO pago(id_pago,forma_pago,n_tarjeta) VALUES ($id_pago,$forma_pago,$n_tarjeta)";
  		$result=$this->worker->query($query);
  		if($result!==null){
        $id_pago=$this->worker->query("SELECT LAST_INSERT_ID()");
  			return $this->getPagoById($id_pago);
  		}
  		return null;
  	}

  	public function addPagoDeposito($id_pago,$forma_pago,$id_factura,$n_deposito)
  	{
  		$info = new Pago($id_pago,$forma_pago,$id_factura,null,$n_deposito);
  		$query= "INSERT INTO Pago(id_pago,forma_pago,id_factura,n_deposito) VALUES ($id_pago,$forma_pago,$id_factura,$n_deposito)";
  		$result=$this->worker->query($query);
  		if($result!==null){
  			return $this->getPagoById($id_pago);
  		}
  		return null;
  	}
    public function deletePago($id)
    {
      $query="DELETE FROM pago WHERE id_pago=$id";
      $result=$this->worker->query($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
    public public function updatePago($id,$id_factura,$forma_pago,$n_tarjeta,$n_deposito)
    {
      $query="UPDATE pago SET id_factura=$id_factura, forma_pago=$forma_pago, n_tarjeta=$n_tarjeta n_deposito=$n_deposito WHERE id_pago=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }

  }
?>
