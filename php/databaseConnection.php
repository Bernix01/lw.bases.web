<?php
	$conn = mysqli_connect("localhost","root","root");
	class DatabaseException extends Exception
	{
	}

	class DatabaseConnection extends Mysqli
	{
		private $database="lw";
		private $host="localhost";
		private $user="root";
		private $password="root";
		$port = NULL;
	    $socket = NULL;
			private $con = false; // Check to see if the connection is active



	    public function __construct() {

	        parent::__construct($this->host, $this->user, $this->password, $this->database, $this->port, $this->socket);
					$this->con=true;
	        $this->throwConnectionExceptionOnConnectionError();
	    }

	    private function throwConnectionExceptionOnConnectionError() {

	        if (!$this->connect_error) return;

	        $message = sprintf('(%s) %s', $this->connect_errno, $this->connect_error);

	        throw new DatabaseException($message);
	    }
			public function disconnect(){
    	// If there is a connection to the database
    	if($this->con){
    		// We have found a connection, try to close it
    		if($this->myconn->close()){
    			// We have successfully closed the connection, set the connection variable to false
    			$this->con = false;
				// Return true tjat we have closed the connection
				return true;
			}else{
				// We could not close the connection, return false
				return false;
			}
		}
    }
	}

?>
