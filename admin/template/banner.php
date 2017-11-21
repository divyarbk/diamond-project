<body>
	<!--Divyar banner-->
<div class="men_banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
	   	  	        
	          
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">
	           
	           <div class="lang_list">
			   		<div class="dropdown">
				   		<?php 
	                        if ( !isset($_SESSION['admin'])){
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
					  <form method="get" action="product.php">
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
		  <h1><a href="index.php"><span class="m_1">Di</span>amond</a></h1>
	   </div>
   	   <div class="menu" style="background-color: rgba(0, 0, 0, 0.32);">
	     <ul class="megamenu skyblue">
		     <li>
				<a class="color2" href="index.php">Home</a>
			</li>
			<li>
				<a class="color2" href="product_insert.php">Product Insert</a>
			</li>
			<li>
				<a class="color4" href="addcate.php">Add Category</a>
			</li>				
				<li>
					<a class="color10" href="report.php">Report</a>
				</li>
				
				
				
				<li class="grid">
					<a class="color3" href="../logout.php">Log out</a>
				</li>
				<li class="grid">
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