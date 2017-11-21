<?php
	session_start();
	require_once 'template/head.php';	
	require_once 'template/banner.php';
	
	if(count(@$_SESSION['cart_items'])>0){
		// get the product ids
		$ids = "";
		foreach($_SESSION['cart_items'] as $id=>$value){
		$ids = $ids . $id . ",";
		}
		
		 // remove the last comma
		$ids = rtrim($ids, ',');
		require_once("core/db2.php");
		$db_handle = new DBController();
		
		$query1 = "SELECT p.productid , p.productname,c.name,p.productprice,p.productpicture FROM product p, category c WHERE productid IN ({$ids}) and p.producttype=c.id ORDER BY productname";									
		$stmt =$db_handle->runQuery($query1);
?>
<script>
	function gettotal(){
			var gtotal=0;
			$('.subtotal').each(function(){
			var jar =$(this).html()-0;
			gtotal+=jar;
			});
			$('#total').html(gtotal);
			$('.total').html(gtotal);
			$('#j_total').val(gtotal)
		}
								  			
	$(document).ready(function(){
		var total=0;
			$('.cart_row').delegate('.quantity','change',function(){
			var tr = $(this).parent().parent();
			var qty= tr.find('.quantity').val()-0;
			var price= tr.find('.price').val()-0;			
			total= price * qty;
			tr.find('.subtotal').html(total);
			gettotal();
			});
	});
</script>
<div class="account-in">
   	 <div class="container">
		  <div class="check_box">	 
		<div class="col-md-9 cart-items">
			 <h1>Checkout</h1>
			
			  <table class="table table table-striped" width="470">
				  <form action="confirm_order.php" method="post">
			 <?php
				 foreach($stmt as $k=>$v) { 
					$pid=$stmt[$k]["productid"];        
					$name=$stmt[$k]["productname"];
					$price=$stmt[$k]["productprice"];
					$img=$stmt[$k]["productpicture"];
					$type=$stmt[$k]["name"];								       
			?>
			<tr class="cart_row">
				<form action="confirm_order.php" method="post">
					<td><input name="id[]" type="hidden" value="<?php echo $pid; ?>"><input name="photo[]" type="hidden" value="<?php echo $img; ?>"><img src="product/<?php echo $pid.'/'.$img;?>" width="150" height="150"></td>	
					<td width="150"><input name="name[]" type="hidden" value="<?php echo $name; ?>"><?php echo $name;?></td>
					 <td width="100"><select name="size[]">
					 <?php
						for($i=9;$i<40;$i++){
						echo('<option value="'.$i.'">'.$i.'</option>');
						  }
					?>
					</select>
					</td>
					<td><input class="price" type="hidden" name="price[]" value="<?php echo $price;?>"><?php echo $price;?></td>
					<td><input type="number" class="quantity" style="width: 50px;" name="quantity[]" min="1" value="0"></td>
					<td class="subtotal">0</td>
					<td><a href='remove_from_cart.php?id=<?php echo $pid;?>&name=<?php echo $name;?>' ><div class="jar_close"> </div></a></td>
			</tr>
			
			  <?php }}else{ echo "Card Empty";} ?>
			<tr class='cart_row'>
				<td colspan='5'><center><b>Total</b><center></td>
				<td id='total' colspan="2">0</td>
			</tr>									       
			</table>
				<hr>
				<div>
					<center><h4><span class="glyphicon glyphicon-list-alt"></span> Fill the requirement</h4></center>
					<input type="hidden" id="j_total" name="p_total">
					<dl class="dl-horizontal">
						<dt>Delivery Address</dt>
						<dd><input style="width: 40%;" class="form-control" placeholder="Enter Address" name="address" required type="text"></dd>
						<br>
						<dt>Delivery Phone</dt>
						<dd><input style="width: 40%;" class="form-control" placeholder="Enter Phone Number" name="phone" required type="text"></dd>
						<br>
						<dt>Bank Account No.</span> </dt>
						<dd><input style="width: 40%;" class="form-control" placeholder="Enter Bank Account" name="number" required type="text"></dd>
					</dl>
				</div>
			<button type="submit" class="btn btn-success" name="submit">Checkout</button>
		 </form>
		</div>
		 
		 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total"></span>
				 <span>Discount</span>
				 <span class="total1">---</span>
				 <span>Delivery Charges</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span class="total"></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
			 <a class="order" href="#">Check out</a>
			 <div class="total-item">
				
				 <p><a href="login.php">Log In</a> If you are not sign in, please sign in first.</p>
			 </div>
			</div>
		 
			<div class="clearfix"></div>
			
	     </div>
	  </div>
   </div>




<?php		
	require_once 'template/footer.php';
?>