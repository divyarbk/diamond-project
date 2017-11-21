<?php
	session_start();
	if ( !isset($_SESSION['admin'])){
		echo "<script>window.location.assign('../logout.php')</script>";
	}
	

	include 'template/head.php';
	
	require_once '../core/db2.php';;
	$divyardb = new DBController();
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
		.s_total{
			font-size: 26px;
		}
		.a_total{
			font-size: 20px;
		}
	</style>
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
	    
	    <div class="container" style="background-color: rgba(52, 206, 233, 0.85); padding-bottom: 500px;">
	

			<h2 style="color: white; background-color: royalblue; padding: 30px 0px 34px 30px; margin-top: 11px;" align="center">Report Page</h2>
			
			<div style="text-align: left; padding: 20px;" class="row">
				<a class="btn btn-success" style="width: 155px; height: 50px; padding: 14px; background-color: salmon; font-weight: bold; font-size: 15px; color: white;" href="?customer">Customer Report</a>
				<a class="btn btn-success" style="width: 155px; height: 50px; padding: 14px; background-color: salmon; font-weight: bold; font-size: 15px; color: white;" href="?annual">Annual Report</a>
				<a class="btn btn-success" style="width: 155px; height: 50px; padding: 14px; background-color: salmon; font-weight: bold; font-size: 15px; color: white;" href="?monthly">Monthly Report</a>
				<?php
					if(isset($_GET['customer'])){
				?>
				
				<center><h1 class="jar_h1">Customer Report</h1></center>
				<button type="button" id="exportcsv">Export Excel</button>
				<table class="table table-striped table-hover jar" id="customer">					
					<thead>
						<tr>
							<th>Customer ID</th>
							<th>Customer Name</th>
							<th>Customer Email</th>
							<th>Customer Address</th>
							<th>Customer Phone</th>
							<th>Create Date</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$c_query="SELECT customer_id, customer_name,customer_email,customer_address,customer_phone,date_format(created_date,'%D %M %Y') as date FROM customer";
							$customer=$divyardb->runQuery($c_query);
							foreach($customer as $k=>$v){
								$id=$customer[$k]['customer_id'];
								$name=$customer[$k]['customer_name'];
								$email=$customer[$k]['customer_email'];
								$address=$customer[$k]['customer_address'];
								$phone=$customer[$k]['customer_phone'];
								$date=$customer[$k]['date'];
								
							
						?>
						<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $name;?></td>
							<td><?php echo $email;?></td>
							<td><?php echo $address;?></td>
							<td><?php echo $phone;?></td>
							<td><?php echo $date;?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				
				<?php	
					}else if(isset($_GET['annual'])){
						@$pick=$_GET['annual'];
				?>
				<center><h1 class="jar_h1">Annual Report</h1></center>
				<p>Select Date</p>
				<form action="report.php" method="get">
				<input type="text" readonly id="date" data-language='en' data-view="years" data-min-view="years" data-date-format="yyyy" name="annual">
				<input type="submit">
				</form>
				<br>
				<button type="button" onclick="$('#annual').TableCSVExport({ delivery: 'download',filename: 'annual.csv'});">Export Excel</button>
				<table class="table table-striped table-hover jar" id="annual">				
					<thead>
						<tr>
							<th>No.</th>
							<th>Date</th>
							<th>Customer Name</th>
							<th>Customer Email</th>
							<th>Bank Account</th>
							<th>Product Name</th>
							<th>Product Size</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							if(!empty($pick)){
								$q_annual="Select distinct o.order_id,date_format(o.order_date,'%D %M %Y') as order_date,c.customer_name, c.customer_email,p.productname,od.photo,od.quantity,od.price,
								(od.quantity*od.price) as total,od.size,o.bank_account
								From `order` o, `customer` c, `product` p ,`order_detail` od where c.customer_id=o.customer_id 
								and o.order_id=od.order_id and od.productid=p.productid and Year(o.order_date)=$pick";
							
							$annual=$divyardb->runQuery($q_annual);
							$no=1;
							
							if($annual==true)
							foreach($annual as $k=>$v){
								$order_id=$annual[$k]['order_id'];
								$order_date=$annual[$k]['order_date'];
								$name=$annual[$k]['customer_name'];
								$email=$annual[$k]['customer_email'];
								$account=$annual[$k]['bank_account'];
								$p_name=$annual[$k]['productname'];
								$photo=$annual[$k]['photo'];
								$size=$annual[$k]['size'];
								$quantity=$annual[$k]['quantity'];
								$price=$annual[$k]['price'];
								$total=$annual[$k]['total'];
								@$all_total+=$total;								
							
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $order_date ?></td>
							<td><?php echo $name ?></td>
							<td><?php echo $email ?></td>
							<td><?php echo $account ?></td>
							<td><?php echo $p_name ?></td>
							<td><?php echo $size ?></td>
							<td><?php echo $quantity ?></td>
							<td><?php echo number_format($price); ?></td>
							<td><?php echo number_format($total); ?></td>							
						</tr>
						
						<?php }else echo('
								<div class="alert alert-warning alert-dismissible j_pad" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>No!</strong> Data record for '.$pick.' please try another years.
								</div>
								');
								}else{
								echo('
								<div class="alert alert-warning alert-dismissible j_pad" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Select The Date!</strong> for annual report.
								</div>
								');
							} ?>
						<tr>
							<td class="s_total" colspan="9">Total</td>
							<td class="a_total">$ <?php echo number_format(@$all_total); ?></td>
						</tr>
					</tbody>
				</table>
				<?php
					}else if(isset($_GET['monthly'])){
						@$month=$_GET['monthly'];
						@$year=$_GET['year'];
				?>
				<center><h1 class="jar_h1">Monthly Report</h1></center>
				<form action="report.php" method="get">
					<p>Select Month</p>
					<input type="text" readonly id="date" data-language='en' data-view="months" data-min-view="months" data-date-format="mm" name="monthly">
					<p>Select Year</p>
					<input type="text" readonly class="date" data-language='en' data-view="years" data-min-view="years" data-date-format="yyyy" name="year">
					<input type="submit">
				</form>
				<br>
				<button type="button" onclick="$('#monthly').TableCSVExport({ delivery: 'download',filename: 'monthly.csv'});">Export Excel</button>
				<table class="table table-striped table-hover jar" id="monthly">				
					<thead>
						<tr>
							<th>No.</th>
							<th>Date</th>
							<th>Customer Name</th>
							<th>Customer Email</th>
							<th>Bank Account</th>
							<th>Product Name</th>
							<th>Product Size</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					
					<tbody>
						
						<?php
							if(!empty($month)){
								$q_monthly="Select distinct o.order_id,date_format(o.order_date,'%D %M %Y') as order_date,c.customer_name, c.customer_email,p.productname,od.photo,od.quantity,od.price,(od.quantity*od.price) as total,od.size,o.bank_account From `order` o, `customer` c, `product` p ,`order_detail` od where c.customer_id=o.customer_id and o.order_id=od.order_id and od.productid=p.productid and Year(o.order_date)=$year and Month(o.order_date)=$month";
							
							$monthly=$divyardb->runQuery($q_monthly);
							$no=1;
							
							if($monthly==true)
							foreach($monthly as $k=>$v){
								$order_id=$monthly[$k]['order_id'];
								$order_date=$monthly[$k]['order_date'];
								$name=$monthly[$k]['customer_name'];
								$email=$monthly[$k]['customer_email'];
								$account=$monthly[$k]['bank_account'];
								$p_name=$monthly[$k]['productname'];
								$photo=$monthly[$k]['photo'];
								$size=$monthly[$k]['size'];
								$quantity=$monthly[$k]['quantity'];
								$price=$monthly[$k]['price'];
								$total=$monthly[$k]['total'];
								@$all_total+=$total;								
							
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $order_date ?></td>
							<td><?php echo $name ?></td>
							<td><?php echo $email ?></td>
							<td><?php echo $account ?></td>
							<td><?php echo $p_name ?></td>
							<td><?php echo $size ?></td>
							<td><?php echo $quantity ?></td>
							<td><?php echo number_format($price); ?></td>
							<td><?php echo number_format($total); ?></td>							
						</tr>
						
						<?php }else echo('
								<div class="alert alert-warning alert-dismissible j_pad" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>No!</strong> Data record for '.$month.'/ '.$year.' please try another years.
								</div>
								');
								}else{
								echo('
								<div class="alert alert-warning alert-dismissible j_pad" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Select The Date!</strong> for annual report.
								</div>
								');
							} ?>
						<tr>
							<td colspan="9" class="s_total">Total</td>
							<td class="a_total">$ <?php echo number_format(@$all_total); ?></td>
						</tr>
					</tbody>
				</table>
				<?php
					}
				?>				
			</div>
	

	    
   		</div>
   		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/datepicker.min.js"></script>
		<script src="../js/i18n/datepicker.en.js"></script>
		<script src="../js/jquery.TableCSVExport.js"></script>
		
		<script>
			$('#exportcsv').click(function (e) {
				
		    e.preventDefault();
		    $('#customer').TableCSVExport({
			    
		        delivery: 'download',
		        filename: 'report.csv'
		    });
		});
					
			//$('#date').val('jar');
			$('#date').datepicker();
			$('.date').datepicker();
		</script>
  <!--Divyar banner-->