<?php

class Database {
	
	private $conn;

	public function DatabaseConnection() {
		$this->conn = mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
		if ($this->conn) { echo "Connected!"; } else { echo "DB Connect Failed: ".mysqli_error(); }
	}
	
	
}

$db = new Database();
$db->DatabaseConnection();

?>