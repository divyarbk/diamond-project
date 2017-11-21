<?php
	session_start();
	include_once 'template/head.php';
?>
<body>
	<!--Divyar banner-->
<div class="banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
	  	      <div class="box_11"><a href="checkout.php">
		  	  <?php @$cart_count=count($_SESSION['cart_items']); ?>
		      <h4><p>Cart: (<?php echo @$cart_count; ?> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
		      </a></div>
	          <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">
	           
	           <div class="lang_list">
			   		<div class="dropdown">
				   		<?php 
	                        if ( !isset($_SESSION['user'])){
		                        echo'<a style="color: white;" href="login.php">Log in</a>';
		                        }
		                ?>				   		
				  	</div>
			 </div>
		  	 
			 <ul class="header_user_info">
			  <a class="login" href="login.php">
				<i class="user"> </i> 
				<li class="user_desc">My Account</li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
		    <!-- start search-->
				<div class="search-box">
				   <div id="sb-search" class="sb-search">
					  <form>
						 <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
						 <input class="sb-search-submit" type="submit" value="">
						 <span class="sb-icon-search"> </span>
					  </form>
				    </div>
				 </div>
				 <!----search-scripts---->
				 <script src="js/classie1.js"></script>
				 <script src="js/uisearch.js"></script>
				   <script>
					 new UISearch( document.getElementById( 'sb-search' ) );
				   </script>
					<!----//search-scripts---->
		            <div class="clearfix"> </div>
			 </div>
		     <div class="clearfix"> </div>
	  </div>
	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="index.html"><span class="m_1">Di</span>amond</a></h1>
	   </div>
   	   <div class="menu" style="background-color: rgba(0, 0, 0, 0.32);">
	     <ul class="megamenu skyblue">
			<li>
				<a class="color2" href="index.php">Home</a>
			</li>
			<li>
				<a class="color4" href="product.php">Product</a>
			</li>				
				<li>
					<a class="color10" href="brands.html">About Us</a>
				</li>
				
				<li>
					<a class="color10" href="brands.html">Contact</a>
				</li>
				
				<li class="active grid">
					<a class="color3" href="logout.php">Log out</a>
				</li>
				<li class="active grid">
				<?php 
	            	   if ( !empty($_SESSION['user']) || !empty($_SESSION['admin'])){
	                        echo '
	                        <a class="color3" href="#">Welcome '.@$_SESSION['user'].@$_SESSION['admin'].'</a>
	                        ';
	                        
	                        }
				?>
				</li>
				
				<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	        </div>
	    </div>
   </div>
  <!--Divyar banner-->
  
  <!--Divyar Main--> 
   <div class="main">
    <div class="container">
	    <center><h1>Welcome To<br>Diamond Pavillon</h1></center>
	    <h1>Our Latest Design</h1>
    	<ul class="content-home" > 	
	    	<?php
				require_once("core/db2.php");
				$db_handle = new DBController();
									
				$home="SELECT * FROM `product` ORDER BY productid DESC LIMIT 6 ";
				$run=$db_handle->runQuery($home);
				foreach($run as $k=>$v){
					$id=$run[$k]["productid"];
					$name=$run[$k]["productname"];										
					$price=$run[$k]["productprice"];
					$descrip=$run[$k]["product_descrip"];
					$photo=$run[$k]["productpicture"];
				
			?>
							        
	    	
           <li style="list-style-type: none;" class="col-sm-4">
              <a href="order.php?order=<?php echo $id; ?>" class="item-link" title="">
                <div class="bannerBox">
                   <img style=" height: 250px; margin-left: 15%" src="product/<?php echo $id.'/'.$photo;?>" class="item-img" title="" alt="<?php echo $photo; ?>">
                  
                </div>
              </a>
           </li>           
          <?php } ?>
           
           <div class="clearfix"></div>         
       </ul>
    </div>
    
   	
   </div>
  <hr>

<?php include_once 'template/footer.php';?>