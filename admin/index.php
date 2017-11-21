<?php
	session_start();
	if ( !isset($_SESSION['admin'])){
		echo "<script>window.location.assign('../logout.php')</script>";
	}
	

	include 'template/head.php';
	include 'template/banner.php';
	require_once '../core/db2.php';
	$divyardb = new DBController();
	$conn=$divyardb->connectDB();
		
	$query="select p.* ,c.name as type from product p, category c where p.producttype=c.id order by productid DESC";
	$product=$divyardb->runQuery($query);
		
		
?>

	
	<div class="container-fluid">
		
		
				<?php
					if(!empty($_GET['edit'])){
						echo '<center><h1 style="background-color: royalblue; padding: 10px 10px 17px; color: cornsilk; margin-top: 10px;">Product Edit</h1></center>';
							$e_id=$_GET['edit'];
							$edit_query="select p.* ,c.name as type from product p, category c where p.producttype=c.id and productid=$e_id";
							$cate_query="select * from category";
							$run_edit=$divyardb->runQuery($edit_query);
							$run_cate=$divyardb->runQuery($cate_query);
							
							foreach($run_edit as $k=>$v){						
							$id=$run_edit[$k]['productid'];
							$name=$run_edit[$k]['productname'];
							$type=$run_edit[$k]['type'];
							$producttype=$run_edit[$k]['producttype'];
							$price=$run_edit[$k]['productprice'];
							$qunatity=$run_edit[$k]['productquantity'];
							$photo=$run_edit[$k]['productpicture'];
							$photo1=$run_edit[$k]['prodcutpicture1'];
							$photo2=$run_edit[$k]['prodcutpicture2'];
							$description=$run_edit[$k]['product_descrip'];
							$gender=$run_edit[$k]['product_gender'];
							}
							echo '
							<div class="container">
								<form action="config/edit_product.php" method="post" enctype="multipart/form-data">						          
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Name: '.$name.'</label>
						            <input type="hidden" name="id" value="'.$id.'">
						            <input type="text" class="form-control" id="name" name="name" value="'.$name.'" required>
						          </div>
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Type: '.$type.'</label>
						            <select name="type" class="form-control">
						            <option value="">Select category</option>';
						    foreach($run_cate as $k=>$v){
							    $c_id=$run_cate[$k]['id'];
							    $c_name=$run_cate[$k]['name'];
							    echo '<option value="'.$c_id.'">'.$c_name.'</option>';
							    }
						          
						         
						   echo   '
						   	 	</select>
						          </div>
								  <div class="form-group">
						            <label for="recipient-name" class="control-label">price: '.$price.'</label>
						            <input type="text" class="form-control" id="price" name="price" value="'.$price.'">
						          </div>
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Photo: '.$photo.'</label>
						            <img src="../product/'.$id.'/'.$photo.'?>" alt="'.$photo.'" class="img-responsive zoom-img item_photo" width="100" height="100">
						            <input type="file" class="form-control" name="photo">
						            <input type="hidden" name="old_pic" value="'.$photo.'">
						          </div>
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Photo1: '.$photo1.'</label>
						            <img src="../product/'.$id.'/'.$photo1.'?>" alt="'.$photo1.'" class="img-responsive zoom-img item_photo" width="100" height="100">
						            <input type="file" class="form-control" name="photo1">
						            <input type="hidden" name="old_pic1" value="'.$photo1.'">
						          </div>
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Photo: '.$photo2.'</label>
						            <img src="../product/'.$id.'/'.$photo2.'?>" alt="'.$photo2.'" class="img-responsive zoom-img item_photo" width="100" height="100">
						            <input type="file" class="form-control" name="photo2">
						            <input type="hidden" name="old_pic2" value="'.$photo2.'">
						          </div>
						          <div class="form-group">
						            <label for="recipient-name" class="control-label">Gender: '.$gender.'</label>
						            <select name="gender" class="form-control">
						            	<option value="">Select Gender</option>
							            <option value="Male">Male</option>
							            <option value="Female">Female</option>
						            </select>
						          </div>
						          <div class="form-group">
						            <label for="message-text" class="control-label">Description</label>
						            <textarea class="form-control" name="description" id="description"> '.$description.'</textarea>
						          </div>
						          <center style="padding-bottom: 100px;"><button style="color: white; width: 115px; height: 43px; background-color: mediumseagreen;" type="submit" class="btn btn-success" name="submit">Update Product</button></center>
						        </form>		
							</div>
							';
							
							
					}else{
						echo '<center><h1 style="background-color: royalblue; padding: 10px 10px 17px; color: cornsilk; margin-top: 10px;">Product Review</h1></center>';
						echo '<table class="table">		
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Type</th>
									<th>Quantity</th>
									<th>Gender</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>			
							<tbody>';
						foreach($product as $k=>$v){						
							$id=$product[$k]['productid'];
							$name=$product[$k]['productname'];
							$type=$product[$k]['type'];
							$price=$product[$k]['productprice'];
							$qunatity=$product[$k]['productquantity'];
							$photo=$product[$k]['productpicture'];
							$photo1=$product[$k]['prodcutpicture1'];
							$photo2=$product[$k]['prodcutpicture2'];
							$description=$product[$k]['product_descrip'];
							$gender=$product[$k]['product_gender'];
							
						echo '
						<tr>
							<td>'.$id.'</td>
							<td>'.$name.'</td>
							<td>'.$type.'</td>
							<td>'.$qunatity.'</td>
							<td>'.$gender.'</td>
							<td><a href="?edit='.$id.'"><img src="../images/edit1.png" width="35" height="35"></a></td>
							<td><a href="config/delete_product.php?delete='.$id.'"><img src="../images/close2.png" width="30" height="30"></a></td>
						</tr>				
						';
						}
						echo '</tbody>
							</table>';
				}
						
						
				?>
				
				
			
		
	</div>
	
	
	
	
				
	

		


