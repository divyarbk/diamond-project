<?php
	if(isset($_POST['submit'])){
		include 'core/db2.php';
		$db_handle = new DBController();
		$con=$db_handle->connectDB();
		
		session_start();
		if(!isset($_SESSION['customer_id'])){
			echo "<script>alert('Please Sign in, Only Member can make the order');</script>";
			echo "<script>window.location.assign('login.php');</script>";
		}else{
			$id=$_POST['id'];
			$name=$_POST['name'];
			$price=$_POST['price'];
			$photo=$_POST['photo'];
			$quantity=$_POST['quantity'];
			$total=$_POST['p_total'];
			$size=$_POST['size'];
			$bank_account=$db_handle->validateFormData($_POST['number']);
			$address=$db_handle->validateFormData($_POST['address']);
			$phone=$db_handle->validateFormData($_POST['phone']);
			$customer_id=$_SESSION['customer_id'];
			$payment_status="paid";	
			$c_payment="select * from bank where account=$bank_account";
			$check_payment=$db_handle->numRows($c_payment);
			
			if($check_payment>0){
				$payment="UPDATE bank SET amount=amount-$total WHERE account='$bank_account'";
				$run_payment=$con->query($payment);
				
				$order="INSERT INTO `order`(customer_id,delivery_address,delivery_phone,bank_account,total,payment) VALUES ('$customer_id','$address','$phone','$bank_account','$total','$payment_status')";
				$run=$con->query($order);
				if($run==true){			
					$la_id=$con->insert_id;
					for($i=0;$i<count($id);$i++){
						$qty=$con->query("update product set productquantity=productquantity-$quantity[$i] where productid=$id[$i]");
						$order_detail=$con->query("INSERT INTO order_detail SET
						order_id='$la_id',
						productid='$id[$i]',
						price='$price[$i]',
						photo='$photo[$i]',
						quantity='$quantity[$i]',
						size='$size[$i]'
						");					
						
						if($order_detail==true){
							unset($_SESSION['cart_items']);
							echo "<script>alert('Thank you');window.location.assign('product.php');</script>";
							echo "GG";
						}else{
							echo "<script>alert('Fail to order');window.location.assign('product.php');</script>";
						}					
						
						}
					//$order_detail="INSERT INTO `order_detail`(`order_id`, `productid`, `price`, `photo`, `quantity`, `size`) VALUES ('$la_id','6','55','F1','2','2')";
					//$run1=mysql_query($order_detail);					
				}
				
				
			}else{
				echo "<script>alert('Order unsuccessful! Check your Bank Account Number ');window.location.assign('checkout.php');</script>";
			}
			
			
				
			
		
		}
	}
?>