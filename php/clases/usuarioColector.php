<?php
include_once('colector.php');
include_once ("usuario.php");
class usuarioColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getAll()
    {
        $query="call getAllUsuarios";
        return $this->worker->execQueryArray($query,Usuario::class);
    }
    public function contar(){
      $query="call contarUsuarios";
      $result=$this->worker->execQueryReturning1($query,"COUNT(usuario.id_usuario)");
      return $result;
    }
    public function getUserByCredentials($nickname, $contrasenia)
    {
        $query = "call getUserByCredentials(\"$nickname\",\"$contrasenia\")";
        $result = $this->worker->execQueryReturning($query,Usuario::class);
        //if ($result !== NULL) {
            //$data = mysqli_fetch_assoc($result); //count(array)(?)
            //$usuario = new Usuario();
          //  $usuario->set_id_usuario($data['id_usuario']);
          //  $usuario->set_nickname($data['nickname']);
          //  $usuario->set_contrasenia($data['contrasenia']);
          //  $usuario->set_email($data['email']);
          //  $usuario->set_last_login($data['last_login']);
          //  $usuario->set_rol($data['rol']);
            return $result;
        //}
        //return NULL;
    }

    public function deleteUsuario($id_usuario)
    {
        $query = "call deleteUsuario(\"$id_usuario)";
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function updateUsuario($id, $nickname, $contrasenia,$rol,$email)
    {
        $query = "call updateUsuario(\"$id\",\"$nickname\",\"$contrasenia\",$rol,\"$email\")";
        echo $query;
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function addUsuario($id, $nickname, $contrasenia, $email, $rol)
    {
        $query = "call addUsuario(\"$id\",\"$nickname\",\"$contrasenia\",$rol,\"$email\")";
        $result = $this->worker->execQuery($query);
        /*if ($result ) {
            $usuario = $this->getUserById($id);
            return $usuario->get_nickname() == $nickname ? $usuario : null;
        }
        return null;*/
        return $result;
    }

    public function getUserById($id)
    {
        $query = "call getUserById($id)";
        $result = $this->worker->execQueryReturning($query, Usuario::class);
        return $result;
    }

    public function realizarPagoDeposito($id_estudiante,$nombres,$apellidos,$total,$direccion,$id_curso){

      $this->worker->beginTransaction();
      $result=$this->worker->execQuery("call realizarPagoDeposito($nombres,$apellidos,$total,$direccion,$id_estudiante,null,$id_curso)");
      $this->worker->commit();
      $result= $result->fetchObject(Factura::class);
      return $result;
    }


}
