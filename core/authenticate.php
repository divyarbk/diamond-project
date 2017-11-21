<?php
	if(isset($_POST['submit'])){
	require_once 'db2.php';
	$db_handle = new DBController();
		
	$username=$db_handle->validateFormData($_POST['in_email']);
	$password=$db_handle->validateFormData($_POST['in_pass']);
	$password=md5($password);
	
	
	$query="select customer_id , customer_name, customer_email  from customer where customer_name='$username' AND customer_password='$password' ";
	$admin="select adminname,password from admin where adminname='$username' AND password='$password' ";
	$check=$db_handle->numRows($query);
	$check_admin=$db_handle->numRows($admin);
	
	if($check>0){
		
	
		$select_user=$db_handle->runQuery($query);
	
		foreach($select_user as $k=>$v) {
			$customer_id=$select_user[$k]["customer_id"];
			$customer_name=$select_user[$k]["customer_name"];
			$customer_email=$select_user[$k]["customer_email"];
		}
		
		
	session_start();
	$_SESSION['customer_id']= $customer_id;
	$_SESSION['user']= $customer_name;
    $_SESSION['customer_email']= $customer_email;
    echo "<script>window.location.assign('../index.php')</script>";
    
	}else if($check_admin>0){
		
			$run_admin=$db_handle->runQuery($admin);
			foreach($run_admin as $k=>$v){
				$admin_name=$run_admin[$k]["adminname"];				
			}
			session_start();
			$_SESSION['admin']=$admin_name;
			echo "<script>window.location.assign('../admin/index.php')</script>";
		
		
	}else{
		echo "<script>alert('Wrong password or username')</script>";
	     
	    echo "<script>window.open('../login.php','_self')</script>";
	}
	
	}