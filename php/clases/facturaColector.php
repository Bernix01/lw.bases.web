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

    public function addFactura($nombres, $apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante,$num_factura)
    {
        //$factura = new Factura(null,$nombres,$apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante,$num_factura);
        $query = "call addFactura(\"$nombres\",\"$apellidos\",$total,\"$direccion\",\"$fecha\",\"$ruc\",$cupos,\"$id_estudiante\",$numero_factura)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function updateFactura($id,$nombres, $apellidos,$total,$direccion,$fecha,$ruc,$cupos,$id_estudiante)
    {
        $query = "call updateFactura($id,\"$nombres\",\"$apellidos\", $total, \"$direccion\",\"$fecha\",\"$ruc\",$cupos,\"$id_estudiante\")";
        $result = $this->worker->execQuery($query);
        return $result;
    }


    public function deleteFactura($id)
    {
        $query = "call deleteFactura($id)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function getAll()
    {
        $query="call getAllFacturas";
        return $this->worker->execQueryArray($query,Factura::class);
    }
    public function comprarCursos($carro){
      $fecha=$date = date('Y-m-d');
      $cupos=sizeof($carro);
      $queries=array("call addFactura","call ");
      return $this->worker->execTransaction($queries);
    }

    public function getFacturasByRange($fecha_inicio,$fecha_fin){
      $query="call getFacturasByRange(\"$fecha_inicio\",\"$fecha_fin\")";
      $result=$this->worker->execQueryArray($query,Factura::class);
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
