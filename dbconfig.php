<?php
$item_per_page = 5;
class Database
{
     
    private $host = "localhost";
    private $db_name = "realestate";
    private $username = "root";
    private $password = "";	
    public $conn;
	public $dblink;
    	
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
	
	public function dbLinkConnection()
	{
     
	    $this->dblink = null;    
        try
		{            
			$this->dblink = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);			
        }
		catch(MySQLiException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->dblink;
    }
}
?>