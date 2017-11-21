<?php
	include "../../core/db2.php";
	$divyardb= new DBController();
	$conn=$divyardb->connectDB();
	
	
	$id=$_POST['id'];
	if(isset($_POST['name'])){
		if($_POST['name']!=""){
						
			$name=$divyardb->validateFormData($_POST['name']);
			$update_name="UPDATE product SET productname='$name' where productid=$id";
			$run_name=$conn->query($update_name);						
		}		
	}
	
	if(isset($_POST['type'])){
		if($_POST['type']!=""){
			$type=$divyardb->validateFormData($_POST['type']);
			$update_type="UPDATE product SET producttype=$type where productid=$id";
			$run_name=$conn->query($update_type);
		}		
	}
	
	if(isset($_POST['price'])){
		if($_POST['price']!=""){
			$price=$divyardb->validateFormData($_POST['price']);
			$update_price="UPDATE product SET productprice=$price where productid=$id";
			$run_name=$conn->query($update_price);
		}		
	}
	
	if(isset($_FILES['photo'])){		
			$old_pic1=$_POST['old_pic'];
			$directoryName = "../../product/$id";
			$photo_name=$_FILES['photo']['name'];
			$photo_type=$_FILES['photo']['type'];
			$photo_size=$_FILES['photo']['size'];
			$photo_tmp=$_FILES['photo']['tmp_name'];
			if($photo_name!=""){
			
			if($photo_type=="image/jpeg" or $photo_type=="image/png" or $photo_type=="image/gif"){
				if($photo_size<=3000000){
					
					if(move_uploaded_file($photo_tmp, $directoryName.'/'.$photo_name)){
						$update_price="UPDATE product SET productpicture='$photo_name' where productid=$id";
						$run_name=$conn->query($update_price);
						unlink($directoryName.'/'.$old_pic1);
					}
					
				}else{
					echo "<script>alert('Image is larger,only 3MB allow');window.location.assign('../index.php');</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid');</script>";
				
			}
		}		
	}
	
	if(isset($_FILES['photo1'])){		
			$old_pic2=$_POST['old_pic1'];
			$directoryName = "../../product/$id";
			$photo_name=$_FILES['photo1']['name'];
			$photo_type=$_FILES['photo1']['type'];
			$photo_size=$_FILES['photo1']['size'];
			$photo_tmp=$_FILES['photo1']['tmp_name'];
			if($photo_name!=""){
			
			if($photo_type=="image/jpeg" or $photo_type=="image/png" or $photo_type=="image/gif"){
				if($photo_size<=3000000){
					
					if(move_uploaded_file($photo_tmp, $directoryName.'/'.$photo_name)){
						$update_photo1="UPDATE product SET prodcutpicture1='$photo_name' where productid=$id";
						$run_photo1=$conn->query($update_photo1);
						unlink($directoryName.'/'.$old_pic2);
					}
					
				}else{
					echo "<script>alert('Image is larger,only 3MB allow');window.location.assign('../index.php');</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid');</script>";
				
			}
		}		
	}
	
	if(isset($_FILES['photo2'])){		
			$old_pic3=$_POST['old_pic2'];
			$directoryName = "../../product/$id";
			$photo_name=$_FILES['photo2']['name'];
			$photo_type=$_FILES['photo2']['type'];
			$photo_size=$_FILES['photo2']['size'];
			$photo_tmp=$_FILES['photo2']['tmp_name'];
			if($photo_name!=""){
			
			if($photo_type=="image/jpeg" or $photo_type=="image/png" or $photo_type=="image/gif"){
				if($photo_size<=3000000){
					
					if(move_uploaded_file($photo_tmp, $directoryName.'/'.$photo_name)){
						$update_photo1="UPDATE product SET prodcutpicture2='$photo_name' where productid=$id";
						$run_photo1=$conn->query($update_photo1);
						unlink($directoryName.'/'.$old_pic3);
					}
					
				}else{
					echo "<script>alert('Image is larger,only 3MB allow');window.location.assign('../index.php');</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid');</script>";
				
			}
		}		
	}
	
	
	
	
	if(isset($_POST['gender'])){
		if($_POST['gender']!=""){
			$gender=$divyardb->validateFormData($_POST['gender']);
			$update_gender="UPDATE product SET product_gender='$gender' where productid=$id";
			$run_name=$conn->query($update_gender);
		}		
	}	
	
	if(isset($_POST['description'])){
		if($_POST['description']!=""){
			$description=$divyardb->validateFormData($_POST['description']);
			$update_description="UPDATE product SET product_descrip='$description' where productid=$id";
			$run_name=$conn->query($update_description);
		}		
	}
	
	echo '<script>window.location.assign("../index.php?edit='.$id.'");</script>';
	
?>