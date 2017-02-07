<?php

class DatabaseException extends Exception
{
}


/**
 * Base de datos.
 */
class Database
{
    private static $connection;
    private static $database = "lw";
    //private static $host = "192.168.100.2";
    private static $host="localhost";
    //private static $user = "miniroot";
    //private static $password = "viveminirootvive";
    private static $user = "root";
    private static $password = "root";


    public function __construct()
    {
        die('Init function is not allowed');
    }
    /**
     * Retorna el estado de la conexión a la base
     *
     * @return array or bool.
     */
    public function getconnectionStatus()
    {
        return mysqli_get_connection_stats(self::$connection);
    }
    public static function connect()
    {
        // One connection through whole application
        if (null == self::$connection) {
            try {
                self::$connection =  new PDO("mysql:host=".self::$host.";dbname=".self::$database.";charset=utf8", self::$user,self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    public static function disconnect()
    {
        self::$connection = null;
    }
  
}

//
//class DatabaseConnection extends Mysqli
//{
//    private $database = "lw";
//    private $host = "localhost";
//    private $user = "miniroot";
//    private $password = "viveminirootvive";
//    private $port = NULL;
//    private $socket = NULL;
//    private $con = false; // Check to see if the connection is active
//
//
//    public function __construct()
//    {
//
//        parent::__construct($this->host, $this->user, $this->password, $this->database, $this->port, $this->socket);
//        $this->con = true;
//        $this->set_charset("utf8");
//        $this->throwConnectionExceptionOnConnectionError();
//    }
//
//    private function throwConnectionExceptionOnConnectionError()
//    {
//
//        if (!$this->connect_error) return;
//
//        $message = sprintf('(%s) %s', $this->connect_errno, $this->connect_error);
//
//        throw new DatabaseException($message);
//    }
//
//    public function lastId()
//    {
//        return $this->insert_id;
//    }
//
//    public function getDBname()
//    {
//      return $this->database;
//    }
//
//}
