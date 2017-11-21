<?php
	session_start();
 	$action = isset($_GET['action']) ? $_GET['action'] : "";
		$name = isset($_GET['name']) ? $_GET['name'] : "";
		 
		if(empty($_GET['order'])){
			header('Location: product.php');
		}else{
			$order=$_GET['order'];
			require_once 'core/db2.php';
			$db_handle = new DBController();
			$que="SELECT p.productid, p.productname,c.name as producttype, p.productprice, p.productquantity, p.productpicture, p.prodcutpicture1,p.prodcutpicture2, p.product_descrip, p.product_gender FROM product p , category c WHERE p.producttype=c.id And productid='$order'";
	
			$select=$db_handle->runQuery($que);
			foreach($select as $k=>$v) {
				
				$product_id=$select[$k]["productid"];
				$product_name=$select[$k]["productname"];
				$product_type=$select[$k]["producttype"];
				$product_price=$select[$k]["productprice"];
				$product_quantity=$select[$k]["productquantity"];
				$product_photo=$select[$k]["productpicture"];
				$product_photo1=$select[$k]["prodcutpicture1"];
				$product_photo2=$select[$k]["prodcutpicture2"];
				$product_description=$select[$k]["product_descrip"];
			}
		}
	 
 
		
    
	include_once 'template/head.php';
	include_once 'template/banner.php';	
?>

   <div class="men">
   	<div class="container">
      <div class="col-md-9 single_top">
      	<div class="single_left">
      	  <div class="labout span_1_of_a1">
			<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="product/<?php echo $product_id.'/'.$product_photo;?>">
							<img src="product/<?php echo $product_id.'/'.$product_photo;?>" />
						</li>
						<li data-thumb="product/<?php echo $product_id.'/'.$product_photo1;?>">
							<img src="product/<?php echo $product_id.'/'.$product_photo1;?>" />
						</li>
						<li data-thumb="product/<?php echo $product_id.'/'.$product_photo2;?>">
							<img src="product/<?php echo $product_id.'/'.$product_photo2;?>" />
						</li>
						
					 </ul>
				  </div>
		          <div class="clearfix"></div>	
	    </div>
		<div class="cont1 span_2_of_a1 simpleCart_shelfItem">
				<h1><?php echo $product_name; ?></h1>
				<p class="availability">Availability: <span class="color">In stock</span></p>
			    <div class="price_single">
				  
				  <span class="amount item_price actual">$<?php echo $product_price; ?></span><a href="#">click for offer</a>
				</div>
				<h2 class="quick">Quick Overview:</h2>
				<p class="quick_desc"> <?php echo $product_description; ?></p>
			    
				
				<div class="quantity_box">
				    <ul class="single_social">
						<li><a href="#"><i class="fb1"> </i> </a></li>
						<li><a href="#"><i class="tw1"> </i> </a></li>
						<li><a href="#"><i class="g1"> </i> </a></li>
						<li><a href="#"><i class="linked"> </i> </a></li>
		   		    </ul>
		   		    <div class="clearfix"></div>
	   		    </div>
			    <a href="add_to_cart.php?id=<?php echo $product_id;?>&name=<?php echo $product_name;?>" class="btn btn-primary btn-normal btn-inline btn_form button" target="_self">Add to cart</a>
			</div>
		    <div class="clearfix"> </div>
		</div>
        
		</div>
		<?php include_once 'template/related_post.php'; ?>
		
     <div class="clearfix"> </div>
	</div>
   </div>
   
<?php include_once 'template/footer.php';?>