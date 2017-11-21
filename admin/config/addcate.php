<?php
	if(isset($_POST['submit'])){
		include '../../core/db2.php';
		$divyardb = new DBController();
		$name=$divyardb->validateFormData($_POST['name']);
		$query="INSERT INTO category(name) VALUES ('$name')";
		
		$con=$divyardb->connectDB();
		$run=$con->query($query);
		if($run==true){
			echo "<script>alert('Category Has Been Added'); window.location.assign('../addcate.php');</script>";
			
		}else{
			echo '<script>alert("Category Has Not Been Added"); window.location.assign("../addcate.php");</script>';
		}
		}

?>