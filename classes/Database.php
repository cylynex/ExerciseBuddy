<?php

class Database {
	
	public $conn;
	
	// Connect DB automatically
	function __construct() {
		$this->DatabaseConnection();
	}

	// DB Connection
	public function DatabaseConnection() {
		$this->conn = mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
		if ($this->conn) { echo "Connected!"; } else { echo "DB Connect Failed: ".mysqli_error(); }
	}
	
	// Generic Queries
	public function Query($queryData) {
		$output = mysqli_query($this->conn,$queryData);
		//$this->ConfirmQuery($output);
		//return $output;
	}
	
	
	// Error Handler TODO make JS popup or something here.
	private function ConfirmQuery($output) {
		if (!$output) {
			die("Query Failed: ".mysqli_error($GLOBALS['conn']->error));
		}
	}
	
	
	// Escaper
	public function Escape($string) {
		$outString = mysqli_real_escape_string($this->conn,$string);
		return outString;
	}
	
	// Add Record
	public function AddRecord($table,$data) {
		echo "Data: <br>";
		var_dump($data);
		foreach (array_keys($data) as $fieldName) {
			if ($data[$fieldName] != NULL) {
				// TODO -> Escape 
			}
			
			if ($fieldName <> "PHPSESSID") {
				if (!$fieldString) {
					$fieldString = "$fieldName";
					$valueString = "'$data[$fieldName]'";
				} else {
					$fieldString .= ",$fieldName";
					$valueString .= ",'$data[$fieldName]'";
				}
			}
		}
				
		$query = "INSERT INTO $table ($fieldString) VALUES ($valueString)";

		// if query is not successful, show error and return
		if (!mysqli_query($this->conn,$query)) {
			//$id = mysqli_insert_id();
			//echo "ID: $id";
			?>
			<script language="javascript">
			alert("<?php echo '<b>Error:</b> '.$GLOBALS['con']->error.'<br /><br /><b>Query was:</b> '.$query; ?>");
			</script>
			<?php
			return;
		} else { echo "added successfully<br>"; }			
	}	
}

$db = new Database();

?>