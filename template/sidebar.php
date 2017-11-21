<div class="men">
    <div class="container">
    	<div class="col-md-4 sidebar_men">

		  <h3>Gender</h3>
    	  <ul class="product-categories color">
    	  <?php
	    	require_once("core/db2.php");
			$db_handle = new DBController();
			
	    	  $select_male='select productid from product where product_gender="male"';
	    	  $select_female='select productid from product where product_gender="female"';
	    	  $price="SELECT productid FROM `product` WHERE productprice<500 ORDER BY productprice DESC";
	    	  $price1="SELECT productid FROM `product` WHERE productprice<1000 ORDER BY productprice DESC";
	    	  $price2="SELECT productid FROM `product` WHERE productprice<5000 ORDER BY productprice DESC";
	    	  $price3="SELECT productid FROM `product` WHERE productprice>5000 ORDER BY productprice DESC";
	    	  $male_count=$db_handle->numRows($select_male);
	    	  $female_count=$db_handle->numRows($select_female);
	    	  $r_price=$db_handle->numRows($price);
	    	  $r_price1=$db_handle->numRows($price1);
	    	  $r_price2=$db_handle->numRows($price2);
	    	  $r_price3=$db_handle->numRows($price3);
    	  ?>
			<li class="cat-item cat-item-60"><a href="product.php?gender=male">Male</a> <span class="count">(<?php echo $male_count; ?>)</span></li>
			<li class="cat-item cat-item-63"><a href="product.php?gender=female">Female</a> <span class="count">(<?php echo $female_count; ?>)</span></li>
			
		  </ul>
		  
		  <h3>Categories</h3>
    	  <ul class="product-categories color">
    	  <?php
				
									
				$select_cat="select * from category order by 1 ASC";
				$run_cat=$db_handle->runQuery($select_cat);
				foreach($run_cat as $k=>$v){
					$id=$run_cat[$k]["id"];
					$name=$run_cat[$k]["name"];
					//$count="SELECT count(productid) as total FROM `product` WHERE producttype='$id'";
					$count="SELECT productid FROM `product` WHERE producttype='$id'";
					$count=$db_handle->numRows($count);
					
					?>
			<li class="cat-item"><a href="product.php?category=<?php echo $id; ?>"><?php echo $name; ?></a> <span class="count">(<?php echo $count; ?>)</span></li>
			
			<?php } ?>
			
		 </ul>		  
		 
		  <h3>Price</h3>
    	  <ul class="product-categories">
	    	<li class="cat-item cat-item-42"><a href="product.php?price=<500">Lower than $500</a> <span class="count">(<?php echo $r_price; ?>)</span></li>
			<li class="cat-item cat-item-60"><a href="product.php?price=<1000">Lower than $1000</a> <span class="count">(<?php echo $r_price1; ?>)</span></li>
			<li class="cat-item cat-item-60"><a href="product.php?price=<5000">Lower than $5000</a> <span class="count">(<?php echo $r_price2; ?>)</span></li>
			<li class="cat-item cat-item-60"><a href="product.php?price=>5000">More than $5000</a> <span class="count">(<?php echo $r_price3; ?>)</span></li>			
		  </ul>
		</div>