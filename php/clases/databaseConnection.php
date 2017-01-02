<?php

class DatabaseException extends Exception
{
}

class DatabaseConnection extends Mysqli
{
    private $database = "lw";
    private $host = "localhost";
    private $user = "miniroot";
    private $password = "viveminirootvive";
    private $port = NULL;
    private $socket = NULL;
    private $con = false; // Check to see if the connection is active


    public function __construct()
    {

        parent::__construct($this->host, $this->user, $this->password, $this->database, $this->port, $this->socket);
        $this->con = true;
        $this->set_charset("utf8");
        $this->throwConnectionExceptionOnConnectionError();
    }

    private function throwConnectionExceptionOnConnectionError()
    {

        if (!$this->connect_error) return;

        $message = sprintf('(%s) %s', $this->connect_errno, $this->connect_error);

        throw new DatabaseException($message);
    }

    public function getDBname()
    {
        return $this->database;
    }

}

?>
