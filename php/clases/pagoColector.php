<?php
include_once('colector.php');
include_once('pago.php');

class PagoColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getPagoById($id_pago)
    {
      $query= "call getPagoById($id_pago)";
  		$result=$this->worker->execQueryReturning($query,Pago::class);
      return $result;
    }

    public function addPagoTarjeta($id_f, $forma_pago, $n_tarjeta)
    {
        $info = new Pago(null, $forma_pago, null, $n_tarjeta, null);
        $query = "call addPagoTarjeta($id_f, $forma_pago, $n_tarjeta)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function addPagoDeposito($forma_pago, $id_factura, $n_deposito)
    {
        $info = new Pago(null, $forma_pago, $id_factura, null, $n_deposito);
        $query = "call addPagoDeposito($id_f, $forma_pago, $n_deposito)";
        $result = $this->worker->execQuery($query);
        if ($result) {
            return $this->getPagoById($this->worker->getLastID());
        }
        return null;
    }

    public function deletePago($id)
    {
        $query = "call deletePago($id)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function getAll()
    {
        $query="call getAllPagos";
        return $this->worker->execQueryArray($query,Pago::class);
    }
    public function getPagosByRange($fecha_i,$fecha_f){
      $query="call getPagosByRange(\"$fecha_i\",\"$fecha_f\")";
      $result=$this->worker->execQueryArray($query,Pago::class);
      $facturas=array();
      if(!$result){
        return $facturas;
      }
      foreach ($result as $f) {
        array_push($facturas,$f);
      }
      return $facturas;
    }

}

?>
