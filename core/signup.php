<?php
	require_once 'db2.php';
	$db_handle = new DBController();
	
	
	
	if(isset($_POST['signup'])){
	 $name=$db_handle->validateFormData($_POST['username']);
	 $password=$db_handle->validateFormData($_POST['password']);
	 $con_password=$db_handle->validateFormData($_POST['confirm_password']);
	 $email=$db_handle->validateFormData($_POST['email']);
	 $location=$db_handle->validateFormData($_POST['location']);
	 $address=$db_handle->validateFormData($_POST['address']);
	 $phone=$db_handle->validateFormData($_POST['phone']);
	 if($password!=$con_password){
		 echo "<script>alert('Password does not match')</script>";
		echo "<script>window.location.assign('../login.php')</script>";
	 }else{
		 $password=md5($password);
	 }
	 
	$query="select * from customer where customer_name='$name' AND customer_email='$email' ";
	
	
	$check=$db_handle->numRows($query);
	
	if($check>0){
		echo "<script>alert('Username and email already exists')</script>";
		echo "<script>window.location.assign('../login.php')</script>";
	}else{
		$conn=$db_handle->connectDB();
		$insert_customer="INSERT INTO customer(customer_name,customer_password,customer_email,customer_location,customer_address,customer_phone) VALUES('$name','$password','$email','$location','$address','$phone')";
		if($run1=$conn->query($insert_customer)){
		echo "<script>alert('Complete Registration')</script>";
		echo "<script>window.location.assign('../login.php')</script>";
		}else{
				echo "Registration Fail";
			}
		
	}
	

		 
	
	 
	}
	 
	 