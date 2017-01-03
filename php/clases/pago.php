<?php
	class Pago{
		private $id_forma_pago;
		private $forma_pago;
		private $id_factura;
		private $n_tarjeta;
		private $n_deposito;
		
		public function __construct($id_forma_pago=null,$forma_pago=null,$id_factura=null,$n_tarjeta=null,$n_deposito=null){
			if($id_forma_pago!==null){
				$this->id_forma_pago=$id_forma_pago;
			}
			if($forma_pago!==null){
				$this->forma_pago=$forma_pago;
			}
			if($id_factura!==null){
				$this->id_factura=$id_factura;
			}
			if($n_tarjeta!==null){
				$this->n_tarjeta=$n_tarjeta;
			}
			if($n_deposito!==null){
				$this->n_deposito=$n_deposito;
			}
			
		}
		
		public function get_id_forma_pago(){
			return $this->id_forma_pago;
		}
		public function set_id_forma_pago($id_forma_pago){
			$this->id_forma_pago=$id_forma_pago;
		}
		public function get_forma_pago(){
			return $this->forma_pago;
		}
		public function set_forma_pago($forma_pago){
			$this->forma_pago=$forma_pago;
		}
		public function get_id_factura(){
			return $this->id_factura;
		}
		public function set_id_factura($id_factura){
			$this->id_factura=$id_factura;
		}
		public function get_n_tarjeta(){
			return $this->n_tarjeta;
		}
		public function set_n_tarjeta($n_tarjeta){
			$this->n_tarjeta=$n_tarjeta;
		}
		public function get_n_deposito(){
			return $this->n_deposito;
		}
		public function set_n_deposito($n_deposito){
			$this->n_deposito=$n_deposito;
		}
		
	}
	
?>