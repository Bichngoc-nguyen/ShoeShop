<?php
class Database 
{
    public $host = 'localhost';
    public $username = 'root';
    public $pass = '';
    public $db = 'bnshop';
    public $conn = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->db);
        if ($this->conn->connect_error ){
			throw new Exception("Database connection failed");
        }
		else{
			mysqli_set_charset($this->conn, 'utf8'); 
		}
    }

    // thực hiện câu truy vấn
	public function executeQuery(string $sql)
	{
		return $this->conn->query($sql);
	}
}
