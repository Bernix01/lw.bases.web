<?php
include_once('databaseConnection.php');

class Colector
{

    private $db_name = "";
    private $con = false; // Check to see if the connection is active
    public $myconn = NULL; // This will be our mysqli object
    private $result = NULL; // Any results from a query will be stored here


    // Function to make connection to database
    public function __construct()
    {
        $this->myconn = new DatabaseConnection();

        $this->con = true;
        //$this->db_name = $this->myconn->getDBname();

        date_default_timezone_set("America/Guayaquil");
    }

    public function close_connection()
    {
        $this->myconn = null;
    }


    public function query($query)
    {


        if ($stmt = $this->myconn->prepare($query)) {
            $stmt->execute();

            /* put result of the query */
            $this->result = $stmt->get_result();

            $stmt->close();

            return $this->result; //return the result of the query
        } else {
            return null; // Table does not exist
        }

    }

    public function listar($table)
    {

        $query="SELECT * FROM $table";
        if ($stmt = $this->myconn->prepare($query)) {
            $stmt->execute();

            /* put result of the query */
            $this->result = $stmt->get_result();

            $stmt->close();
            return $this->result; //return the result of the query
        } else {

            return NULL; // Table does not exist
        }

    }
    public function contar($table)
    {

        $query="SELECT COUNT(*) from $table";
        if ($stmt = $this->myconn->prepare($query)) {
            $stmt->execute();

            /* put result of the query */
            $this->result = $stmt->get_result();

            $stmt->close();
            return $this->result; //return the result of the query
        } else {
            
            return NULL; // Table does not exist
        }

    }


    // Private function to check if table exists for use with queries
    private function tableExists($table)
    {
        $tablesInDb = $this->myconn->query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb) {
            if ($tablesInDb->num_rows == 1) {
                return true; // The table exists
            } else {
                array_push($this->result, $table . " does not exist in this database");
                return false; // The table does not exist
            }
        }
    }
    public function getLastId($col,$table)
    {
      $query="SELECT MAX($col) FROM $table";
      $res = $this->query($query);
      return mysqli_fetch_array($res)[0];
    }

    // Escape your string
    public function escapeString($data)
    {
        return $this->myconn->real_escape_string($data);
    }
}

?>
