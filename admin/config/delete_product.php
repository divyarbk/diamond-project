<?php
	if(isset($_GET['delete'])){
		include_once '../../core/db2.php';
		$divyardb=new DBController();
		$conn=$divyardb->connectDB();
		echo $id=$_GET['delete'];
		$detail_query="DELETE FROM order_detail WHERE productid=$id";
		$product_query="DELETE FROM product WHERE productid=$id";
		if($conn->query($detail_query)){
			if($conn->query($product_query)){
				$del_path='../../product/'.$id;
				$divyardb->removeDirectory($del_path);
				echo "<script>window.location.assign('../index.php');</script>";
			}
		}
	}
?>