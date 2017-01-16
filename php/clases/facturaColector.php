<?php
include_once('colector.php');
include_once('factura.php');

class FacturaColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getFacturaById($id)
    {
        return $this->worker->getById($id, "factura", "id_factura", Factura::class);
    }

    public function addFactura($nombres, $apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante,$id_pago)
    {
        $factura = new Factura(null,$nombres,$apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante,$id_pago);
        $query = "INSERT INTO factura(nombres,apellidos,total,direccion,fecha,ruc,cupos,id_estudiante,id_pago) VALUES (\"$nombres\",\"$apellidos\",$total,\"$direccion\",\"$fecha\",\"$ruc\",$cupos,$id_estudiante,$id_pago)";
        $result = $this->worker->execQuery($query);
        if ($result) {
            $id_factura = $this->worker->getLastID();
            return $this->getFacturaById($id_factura);
        }
        return null;
    }

    public function updateFactura($id,$nombres, $apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante,$id_pago)
    {
        $query = "UPDATE factura SET nombres=\"$nombres\", apellidos=\"$apellidos\", total=$total, direccion=\"$direccion\", fecha=\"$fecha\",ruc=\"$ruc\",cupos=$cupos,id_estudiante=\"$id_estudiante\",id_pago=$id_pago WHERE id_factura=$id";
        echo $query;
        $result = $this->worker->execQuery($query);
        return $result;
    }


    public function deleteFactura($id)
    {
        $query = "DELETE FROM factura WHERE id_factura=$id";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function getAll()
    {
        return $this->worker->read("factura",Factura::class);
    }

}

?>
