<?php
	include_once('colector.php');
	include_once ('factura.php');
	class FacturaColector{
		private $worker=NULL;

		public function __construct(){
			$this->worker= new Colector();
		}

		public function getFacturaById($id){
			$query= "SELECT * FROM factura WHERE factura.id_factura=".$id." limit 1";
			$result=$this->worker->query($query);
			if($result!==NULL){
				$data=mysqli_fetch_object($result,'Factura');//count(array(?)
				return $data;
			}
			return NULL;
		}

		public function addFactura($factura){
			$query= "INSERT INTO factura VALUE (DEFAULT(),$factura->get_nombres(),$factura->get_apellidos()$factura->get_total(),
			$factura->get_direccion(),$factura->get_fecha(),$factura->get_ruc(),$factura->get_cupos(); SELECT LAST_INSERT_ID();";
			$result=$this->worker->query($query);
			$nuevo_id = (mysqli_fetch_assoc($result));
			$curso->set_id_factura($nuevo_id["id_factura"]);
			return $factura;
		}
	}
?>