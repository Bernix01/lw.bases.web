<?php
include_once('databaseConnection.php');


class Colector
{
    protected $con;

    public function __construct()
    {
        $this->con = Database::connect();
        date_default_timezone_set("America/Guayaquil");

    }


    /*public function read($table, $class = 'stdClass')
    {
        try {
            $queryRead = 'SELECT * FROM ' . $table;
            $stmt = $this->con->prepare($queryRead);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }*/
    public function execQueryArray($query, $class =  stdClass::class)
    {
        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function execQuery($query)
    {
        try {
            //        echo($query);
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function execQueryReturning($query, $class='stdClass')
    {
        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            return $stmt->fetchObject($class);
        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }
    public function execTransaction($queries){
      try{
        $this->con->beginTransaction();
        foreach($queries as $query){
          $stmt = $this->con->prepare($query);
          $stmt->execute();
        }
        $this->con->commit();
        return true;
      }catch (PDOException $e){

        $this->con->rollback();
        echo $e->getMessage();
        return false;
      }
    }
    public function execQueryReturning1($query, $col)
    {
        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $re=$stmt->fetch(PDO::FETCH_ASSOC);
            return ($re[$col]);

            //echo $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }

    public function execQueryAVG($query)
    {
        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Escape your string
    public function escapeString($data)
    {
        return $this->conn->real_escape_string($data);
    }


}


//
//class Colector
//{
//
//    private $db_name = "";
//    private $con = false; // Check to see if the connection is active
//    public $myconn = NULL; // This will be our mysqli object
//    private $result = NULL; // Any results from a query will be stored here
//
//
//    // Function to make connection to database
//    public function __construct()
//    {
//        $this->myconn = new DatabaseConnection();
//
//        $this->con = true;
//        //$this->db_name = $this->myconn->getDBname();
//
//    }
//
//    public function close_connection()
//    {
//        $this->myconn = null;
//    }
//
//    public function execQueryReturning($query, $class)
//    {
//        try {
//            $stmt = $this->con->prepare($query);
//            $stmt->execute();
//            return $stmt->fetchObject($class);
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//            return false;
//        }
//    }
//
//    public function query($query)
//    {
//
//
//        if ($stmt = $this->myconn->prepare($query)) {
//            $stmt->execute();
//
//            /* put result of the query */
//            $this->result = $stmt->get_result();
//
//            $stmt->close();
//
//            return $this->result; //return the result of the query
//        } else {
//            return null; // Table does not exist
//        }
//
//    }
//
//    public function listar($table)
//    {
//
//        $query="SELECT * FROM $table";
//        if ($stmt = $this->myconn->prepare($query)) {
//            $stmt->execute();
//
//            /* put result of the query */
//            $this->result = $stmt->get_result();
//
//            $stmt->close();
//            return $this->result; //return the result of the query
//        } else {
//
//            return NULL; // Table does not exist
//        }
//
//    }
//
//
//
//    // Private function to check if table exists for use with queries
//    private function tableExists($table)
//    {
//        $tablesInDb = $this->myconn->query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
//        if ($tablesInDb) {
//            if ($tablesInDb->num_rows == 1) {
//                return true; // The table exists
//            } else {
//                array_push($this->result, $table . " does not exist in this database");
//                return false; // The table does not exist
//            }
//        }
//    }
//    public function getLastId()
//    {
//      return $this->myconn->lastId();
//    }
//
//}
//
