<?php
	session_start();
	include_once 'template/head.php';
	include_once 'template/banner.php';
	include_once 'template/sidebar.php';
?>


   
    	<div class="col-md-8 mens_right">
	    	
    		<div class="dreamcrub">
			   	<ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        Men / Women&nbsp;
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   
    		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>					
					<div class="clearfix"></div>
					<ul>
						<?php
							
							if (empty($_GET)) {
									$query ="SELECT productid, productname,productprice, productpicture, product_descrip, product_gender FROM product order by 1 DESC";
									}else if(isset($_GET['category'])){
										@$cat=$_GET['category'];
										$query ="SELECT productid, productname,productprice, productpicture, product_descrip, product_gender FROM product where producttype='$cat' order by 1 DESC";
									}else if(isset($_GET['gender'])){
										@$gen=$_GET['gender'];
										$query ="SELECT productid, productname,productprice, productpicture, product_descrip, product_gender FROM product where product_gender='$gen' order by 1 DESC";
									}else if(isset($_GET['search'])){
										@$search=$_GET['search'];
										$query="SELECT * FROM `product` WHERE `productname` LIKE '%$search%' ORDER BY productid DESC";
									}else if(isset($_GET['price'])){
										@$price=$_GET['price'];
										$query="SELECT * FROM `product` WHERE productprice$price ORDER BY productprice DESC";
									}
									 
									$row=$db_handle->runQuery($query);
									
									if($row==true)
									foreach($row as $k=>$v) {
										
										$id=$row[$k]["productid"];
										$name=$row[$k]["productname"];										
										$price=$row[$k]["productprice"];
										$descrip=$row[$k]["product_descrip"];
										$photo=$row[$k]["productpicture"];
						?>
						<li class="last simpleCart_shelfItem">
							<a class="cbp-vm-image" href="order.php?order=<?php echo $id; ?>">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="product/<?php echo $id.'/'.$photo;?>" alt="<?php echo $photo;?>" class="img-responsive zoom-img item_photo"></div>
									<div class="mask">
			                       		<div class="info">Quick View</div>
					                 </div>
					                 <div class="product_container">
									   <h4 class="item_name"><?php echo $name; ?></h4>									   
									   <div class="price mount item_price">$<?php echo $price; ?></div>
									   <a class="button item_add cbp-vm-icon cbp-vm-add" href="add_to_cart.php?id=<?php echo $id;?>&name=<?php echo $name;?>">Add to cart</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
						</li>
						
						
						
				<?php } else echo "No item available"; ?>				
						
						
						
						
						
						
					</ul>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
    	</div>
    </div>
   </div>
  
<?php include_once 'template/footer.php';?>