<?php
	session_start();
	if ( !isset($_SESSION['admin'])){
		echo "<script>window.location.assign('../logout.php')</script>";
	}
	

	include 'template/head.php';
	
	require_once '../core/db2.php';;
	$divyardb = new DBController();
	$query="select * from category";
	$run=$divyardb->runQuery($query);
	
	
	
	if(!isset($_GET['edit'])){
		
?>
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
	    
	    <div class="container" style="background-color: rgba(52, 206, 233, 0.85); padding-bottom: 100px;">
	<?php
		if(isset($_GET['delete'])){
		$d_id=$_GET['delete'];
		require_once '../core/db2.php';
		$divyardb = new DBController();
		$delete="DELETE FROM category WHERE id='$d_id'";
		$con=$divyardb->connectDB();
		$run=$con->query($delete);
		if($run==true){
			echo "<script>alert('Deleted'); window.location.assign('addcate.php');</script>";
		}else{
			echo "<script>alert('Error'); window.location.assign('addcate.php');</script>";
		}
	}
	?>
<style type="text/css" media="screen">
		.jar{
			margin-top: 20px;
		}
		.jar th{
			text-align: center;
			color: rgba(18, 190, 229, 0.74);
			background-color: white;
		}
		.jar_h1{
			padding: 20px;
			color: papayawhip;
			background-color: royalblue;
			width: 270px;
			margin-top: 30px;
		}
		.jar_h1:hover{
			background-color: rgba(228, 47, 228, 0.61);
			
		}
		.jar tbody tr{
			background-color: white;
			text-align: center;
		}
		.j_pad{
			margin-top: 50px;
		}
		
	</style>
	<h2 style="color: white; background-color: royalblue; padding: 30px 0px 34px 30px; margin-top: 11px;" align="center">Add Category</h2>
	<div class="tab-content" style="padding: 50px 0px 100px 0px">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="config/addcate.php">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Category Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" placeholder="Product Name" name="name" required>
									</div>
																		
								</div>
								
								<center>
								<button style="color: white; width: 65px; height: 35px; background-color: palevioletred;" type="reset" class="btn btn-danger">Reset</button>
								<button style="color: white; width: 65px; height: 35px; background-color: mediumseagreen;" type="submit" class="btn btn-success" name="submit">Insert</button>
								</center>
								
							</form>
						</div>
						<hr style="height: 2px;">
						<h2 style="padding-top: 30px; color: white;">Category List</h2>
						<h4 style="color: lightcyan; background-color: royalblue;">Click for edit or delete category</h4>												
							<table class="table table-striped table-hover jar">
								<thead>
									<tr class="danger">
										<td align="center">Category Name</td>
										<td align="center">Edit</td>
										<td align="center">Delete</td>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($run as $k=>$v) {
									$id=$run[$k]["id"];
									$name=$run[$k]["name"];								    
									?>
										<tr>
											<td><?php echo $name; ?></td>
											<td align="center"><a href="?edit=<?php echo $id; ?>"><img src="../images/edit.png" width="35" height="35"></a></td>
											<td align="center"><a class="jar_close1" href="?delete=<?php echo $id; ?>"></a></td>
										</tr>
												 
							
							<?php } ?>
								</tbody>
							</table>
						
					</div>
		
</div>
<?php } 	
	else{
	$e_id=$_GET['edit'];
	$query="select * from category where id='$e_id'";
	$run=$divyardb->runQuery($query);
	
?>
<div class="container"  style="padding-bottom: 400px;">
	<h2 style="color: white; background-color: royalblue; padding: 30px 0px 34px 30px; margin-top: 11px;" align="center">Edit Category</h2>
	<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="config/editcate.php">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Category Name</label>
									<div class="col-sm-8">										
										<?php
									foreach($run as $k=>$v) {
									$id=$run[$k]["id"];
									$name=$run[$k]["name"];
									}								    
									?>									
										
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="<?php echo $name; ?>" required>
									</div>
																		
								</div>
								
								<center>								
								<button style="color: white; width: 65px; height: 35px; background-color: mediumseagreen;" type="submit" class="btn btn-success" name="submit">Update</button>
								</center>
								
							</form>
						</div>
</div>
<?php } ?>
	    
   </div>
  <!--Divyar banner-->

