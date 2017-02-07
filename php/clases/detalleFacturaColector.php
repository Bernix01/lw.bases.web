<?php
include_once('colector.php');
include_once('detalleFactura.php');

class detalleFacturaColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getAll(){
        return $this->worker->read("detalle_factura",DetalleFactura::class);
    }

    public function getDetallesByFacturaId($id)
    {
        $query = "call getDetallesByFacturaId($id)";
        $result = $this->worker->execQueryArray($query,DetalleFactura::class);
        return $result;
    }


    public function deleteDetalleFactura($id)
    {
        $query = "call deleteDetalleFactura($id)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function updateDetalleFactura($id_factura, $id_curso,$fecha,$total,$nombres,$apellidos,$numero_factura,$ruc,$cupos)
    {
        $query = "call updateDetalleFactura($id_factura,$id_curso)";
        echo $query;
        $result = $this->worker->execQuery($query);
        return $result;
    }


}

?>
