<div class="col-md-3 tabs">
	<h3 class="m_1">Related Products</h3>
	
	<?php
		$relate="SELECT p.productid, p.productname,c.name as producttype, p.productprice, p.productquantity, p.productpicture, p.prodcutpicture1,p.prodcutpicture2, p.product_descrip, p.product_gender FROM product p , category c WHERE p.producttype=c.id ORDER BY p.productid DESC LIMIT 5";
	
			$select=$db_handle->runQuery($relate);
			foreach($select as $k=>$v) {
				
				$related_id=$select[$k]["productid"];
				$related_name=$select[$k]["productname"];
				$related_type=$select[$k]["producttype"];
				$related_price=$select[$k]["productprice"];
				$related_quantity=$select[$k]["productquantity"];
				$related_photo=$select[$k]["productpicture"];
				$related_photo1=$select[$k]["prodcutpicture1"];
				$related_photo2=$select[$k]["prodcutpicture2"];
				$related_description=$select[$k]["product_descrip"];
			
	?>
	      <ul class="product">
	      	<li class="product_img"><img src="product/<?php echo $related_id.'/'.$related_photo;?>" class="img-responsive"/></li>
	      	<li class="product_desc">
	      		<h4><a href="#"><?php echo $related_name; ?></a></h4>
	      		<p class="single_price"><?php echo $related_price; ?></p>
	      		<a href="order.php?order=<?php echo $related_id; ?>" class="link-cart">Detail</a>
	      	    <a href="add_to_cart.php?id=<?php echo $related_id;?>&name=<?php echo $related_name;?>" class="link-cart">Add to Cart</a>
	        </li>
	      	<div class="clearfix"> </div>
	      </ul>
	      <?php } ?>
	      
	      	
        </div>