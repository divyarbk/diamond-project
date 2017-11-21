<?php
	if(isset($_POST['submit'])){
	require_once '../../core/db2.php';
	$divyardb = new DBController();
	$id=$divyardb->validateFormData($_POST['id']);
	$name=$divyardb->validateFormData($_POST['name']);
	$update="UPDATE category SET name='$name' WHERE id='$id'";
	$con=$divyardb->connectDB();
	$run=$con->query($update);
	if($run==true){
		echo "<script>alert('Category Has Been Updated');</script>";
		
		echo "<script>window.location.assign('../addcate.php');</script>";
	}else{
		echo "<script>alert('Category Update Failed.');</script>";
	}
}
?>