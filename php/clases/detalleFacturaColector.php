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
        $query = "SELECT * FROM detalle_factura WHERE id_factura=\"" . $id . "\" ";
        $result = $this->worker->execQueryArray($query,DetalleFactura::class);
        return $result;
    }


    public function deleteDetalleFactura($id)
    {
        $query = "DELETE FROM detalle_factura WHERE id_factura=$id";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function updatDetalleUsuario($id_factura, $id_curso)
    {
        $query = "UPDATE detalle_factura SET  id_curso=\"$id_curso\" WHERE id_factura=\"$id_factura\"";
        echo $query;
        $result = $this->worker->execQuery($query);
        return $result;
    }


}

?>
