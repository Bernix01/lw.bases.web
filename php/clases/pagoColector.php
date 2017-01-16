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
        return $this->worker->getById($id_pago, "pago", "id_pago", Pago::class);
    }

    public function addPagoTarjeta($id_f, $forma_pago, $n_tarjeta)
    {
        $info = new Pago(null, $forma_pago, null, $n_tarjeta, null);
        $query = "INSERT INTO pago(id_factura,forma_pago,n_tarjeta) VALUES ($id_f,$forma_pago,$n_tarjeta)";
        $result = $this->worker->execQuery($query);
        if ($result ) {
            $id_pago = $this->worker->getLastID();
            return $this->getPagoById($id_pago);
        }
        return null;
    }

    public function addPagoDeposito($id_f, $forma_pago, $id_factura, $n_deposito)
    {
        $info = new Pago(null, $forma_pago, $id_factura, null, $n_deposito);
        $query = "INSERT INTO Pago(id_factura,forma_pago,id_factura,n_deposito) VALUES ($id_f,$forma_pago,$id_factura,$n_deposito)";
        $result = $this->worker->execQuery($query);
        if ($result) {
            return $this->getPagoById($this->worker->getLastID());
        }
        return null;
    }

    public function deletePago($id)
    {
        $query = "DELETE FROM pago WHERE id_pago=$id";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function getAll()
    {
        return $this->worker->read("pago",Pago::class);
    }

}

?>
