<?php
	include_once('colector.php');
	include_once ('pago.php');
	class PagoColector{
		private $worker=NULL;

		public function __construct(){
			$this->worker= new Colector();
		}

		public function getPagoById($id){
			$query= "SELECT * FROM pago WHERE pago.id_forma_pago=".$id." limit 1";
			$result=$this->worker->query($query);
			if($result!==NULL){
				$data=mysqli_fetch_object($result,'Pago'); 	//count(array(?)
				return $data;
			}
			return NULL;
		}

		public function addPago($pago){
			$query= "INSERT INTO pago VALUE (DEFAULT(),$pago->get_forma_pago(),$pago->get_n_tarjeta(),$pago->get_n_deposito(); SELECT LAST_INSERT_ID();";
			$result=$this->worker->query($query);
			$nuevo_id = (mysqli_fetch_assoc($result));
			$curso->set_id_pago($nuevo_id["id_pago"]);
			return $pago;
		}
	}
?>