<?php
class Database
{
	 private $host 		=	"localhost";
	 private $user		=	"root";
	 private $pass	 	=	"";
	 protected $dbName	=	"etechdss_demo";
	 protected $mysqli	=	"";
	 protected $conn 	= 	false;
	 private $result	= 	array();
	public function __construct()
	{
		if (!$this->conn) {
			$this->mysqli=new mysqli($this->host, $this->user,$this->pass,$this->dbName);
			$this->conn=true;
			if ($this->mysqli->connect_error) {
				array_push($this->result, $this->mysqli->connect_error);
				return false;
			}
			else {
				return true;
			}
		} 
	}

}

?>
