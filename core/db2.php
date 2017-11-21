<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "divyar";
	private $database = "divyar_store";
	
	function __construct() {
		$conn = $this->connectDB();
		
	}		
			
	
	function connectDB() {
		$conn = new mysqli( $this->host, $this->user, $this->password, $this->database );
		if($conn->connect_error) {
			return die($conn->connect_error);
		}
		return $conn;
	}
	
	
	function run($query){
		$conn = $this->connectDB();
		$result=$conn->query($query);
		return $result;
	}
	
	
	function runLast($query){
		$conn = $this->connectDB();
		$result=$conn->query($query);		
		$last_id = $conn->insert_id;
		return $$last_id;
	}
	
	
	function runQuery($query) {
		$conn=$this->connectDB();
		$result=$conn->query($query);		
		while($row=$result->fetch_assoc()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$conn=$this->connectDB();
		$result=$conn->query($query);
		$rowcount =$result->num_rows;		
		return $rowcount;	
	}

	function validateFormData($data){
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = strip_tags($data);
		 $data = htmlspecialchars($data);
		return $data;
	}
	
	function Delete($path){
		if (is_dir($path) === true){
			$files = array_diff(scandir($path), array('.', '..'));
			foreach ($files as $file){
				Delete(realpath($path) . '/' . $file);
        	}
        	return rmdir($path);
    	}else if (is_file($path) === true){
	    	return unlink($path);
    	}

		return false;
	}
	
	function removeDirectory($path) {
		$files = glob($path . '/*');
		foreach ($files as $file) {
			is_dir($file) ? removeDirectory($file) : unlink($file);
		}
		rmdir($path);
		return;
	}


}



?>