<?php
	if(isset($_POST['submit'])){
		include '../core/db2.php';
		$jardb = new DBController();
		
		
		$name=$jardb->validateFormData($_POST['name']);
		$type=$jardb->validateFormData($_POST['type']);
		$price=$jardb->validateFormData($_POST['price']);
		$quantity=$jardb->validateFormData($_POST['quantity']);
		$gender=$jardb->validateFormData($_POST['gender']);
		$description=$jardb->validateFormData($_POST['description']);
		
		$photo_name=$_FILES['pic1']['name'];
		$photo_type=$_FILES['pic1']['type'];
		$photo_size=$_FILES['pic1']['size'];
		$photo_tmp=$_FILES['pic1']['tmp_name'];
		
		$photo_name1=$_FILES['pic2']['name'];
		$photo_type1=$_FILES['pic2']['type'];
		$photo_size1=$_FILES['pic2']['size'];
		$photo_tmp1=$_FILES['pic2']['tmp_name'];
		
		$photo_name2=$_FILES['pic3']['name'];
		$photo_type2=$_FILES['pic3']['type'];
		$photo_size2=$_FILES['pic3']['size'];
		$photo_tmp2=$_FILES['pic3']['tmp_name'];
		
		
		if($name==""){
			echo "<script>alert ('Please Fill the Product Name.'); window.location.assign('index.php');</script>";
		}
		if($type==""){
			echo "<script>alert ('Please Fill the Product Name.'); window.location.assign('index.php');</script>";
		}
		if($price==""){
			echo "<script>alert ('Please Fill the Product Name.'); window.location.assign('index.php');</script>";
		}
		if($quantity==""){
			echo "<script>alert ('Please Fill the Product Name.'); window.location.assign('index.php');</script>";
		}
		if($description==""){
			echo "<script>alert ('Please Fill the Product Name.'); window.location.assign('index.php');</script>";
		}
				
		
		
		
		$query="INSERT INTO product (productname, producttype, productprice, productquantity, productpicture, prodcutpicture1, prodcutpicture2, product_descrip, product_gender) VALUES ('$name','$type','$price','$quantity','$photo_name','$photo_name1','$photo_name2','$description','$gender')";	
		
		$conn=$jardb->connectDB();
		
		//$run=$jardb->run($query);
		$run=$conn->query($query);
		if($run==true){	
		
		
		
		    $la_id=$conn->insert_id;
			$directoryName = "../product/$la_id";
			
			if(!is_dir($directoryName)){			
			    $oldmask = umask(0);
				mkdir($directoryName, 0777);
				umask($oldmask);		    
			}
			
			if($photo_type=="image/jpeg" or $photo_type=="image/png" or $photo_type=="image/gif"){
				if($photo_size<=3000000){
					move_uploaded_file($photo_tmp, $directoryName.'/'.$photo_name);
					
				}else{
					echo "<script>alert('Image is larger,only 3MB allow')</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid')</script>";
				
			}
		
		
		
		if($photo_type1=="image/jpeg" or $photo_type1=="image/png" or $photo_type1=="image/gif"){
				if($photo_size1<=3000000){
					move_uploaded_file($photo_tmp1, $directoryName.'/'.$photo_name1);
					
				}else{
					echo "<script>alert('Image is larger,only 3MB allow')</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid')</script>";
				
			}
			
			
			if($photo_type2=="image/jpeg" or $photo_type2=="image/png" or $photo_type2=="image/gif"){
				if($photo_size2<=3000000){
					move_uploaded_file($photo_tmp2, $directoryName.'/'.$photo_name2);
					
				}else{
					echo "<script>alert('Image is larger,only 35MB allow')</script>";
				}
			}else{
				echo "<script>alert('Image type is invalid')</script>";
				
			}
			echo "<script>alert('Product Has Been Inserted'); window.location.assign('index.php');</script>";
		}else{
			echo "Fail";
			echo "<script>alert('Fail'); window.location.assign('index.php');</script>";
		}
		
	}
	
?>