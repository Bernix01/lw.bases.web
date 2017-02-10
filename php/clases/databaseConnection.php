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
