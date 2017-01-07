<?php
include_once('colector.php');
include_once ('pago.php');
class pagoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getPagoById($id_forma_pago){
      $query= "SELECT * FROM pago WHERE id_forma_pago=".$id_forma_pago." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_object($result,'Pago'); //count(array)(?)

        return $data;
      }
      return NULL;
    }
    
	public function addPagoTarjeta($id_forma_pago,$forma_pago,$n_tarjeta)
	{
		$info = new Pago($id_forma_pago,$forma_pago,$n_tarjeta);
		$query= "INSERT INTO Pago(id_forma_pago,forma_pago,n_tarjeta) VALUES ($id_forma_pago,\"$forma_pago\",\"$n_tarjeta\")";
		$result=$this->worker->query($query);
		if($result!==null){
			return $this->getPagoById($id_forma_pago);
		}
		return null;
	}
	
	public function addPagoDeposito($id_forma_pago,$forma_pago,$n_deposito)
	{
		$info = new Pago($id_forma_pago,$forma_pago,$n_deposito);
		$query= "INSERT INTO Pago(id_forma_pago,forma_pago,n_deposito) VALUES ($id_forma_pago,\"$forma_pago\",\"$n_deposito\")";
		$result=$this->worker->query($query);
		if($result!==null){
			return $this->getPagoById($id_forma_pago);
		}
		return null;
	}

  }
?>