<?php
	session_start();
	if ( !isset($_SESSION['admin'])){
		echo "<script>window.location.assign('../logout.php')</script>";
	}
	

	include 'template/head.php';
	include 'template/banner.php';
	include '../core/db2.php';
	$divyardb = new DBController();
		
	$query="select * from category";
	$run=$divyardb->runQuery($query);	
		
?>

		
<script>
	
function readURL(input,show) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(show)
                    .attr('src', e.target.result)
                    .width(250)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>

<div class="container" style="padding: 70px 50px 100px 50px;">
	<h2 align="center">Product Insert Page</h2>
	<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="config/product_insert.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="name" placeholder="Product Name" name="name" required>
									</div>
																		
								</div>
								
								<div class="form-group">
									<label for="type" class="col-sm-2 control-label">Product Tye</label>
									<div class="col-sm-8">
										<select class="form-control" name="type">
											<?php
												foreach($run as $k=>$v) {
										
												$id=$run[$k]["id"];
												$name=$run[$k]["name"];								    
								        ?> 
								        <option value="<?php echo $id ?>"><?php echo $name; ?></option>
								        <?php
									        }
								        ?>
										</select>
										
									</div>
																		
								</div>
								
								<div class="form-group">
									<label for="price" class="col-sm-2 control-label">Product Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="price" placeholder="Product Price" name="price" required>
									</div>
																	
								</div>
								
								<div class="form-group">
									<label for="quantity" class="col-sm-2 control-label">Product Quantity</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="quantity" placeholder="Product Quantity" name="quantity" required>
									</div>
																		
								</div>



								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-8">
										<div class="radio block"><label><input type="radio" value="Female" name="gender" checked=""> Female</label></div>
										<div class="radio block"><label><input type="radio" value="Male" name="gender">Male</label></div>
										
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="pic1"  class="col-sm-2 control-label">Image 1</label>
									<div class="col-sm-8">
										<input type="file" id="pic1" name="pic1" onchange="readURL(this,'#blah');" required>
										<img  id="blah" src="#" alt="Image Preview" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="pic2"  class="col-sm-2 control-label">Image 2</label>
									<div class="col-sm-8">
										<input type="file"  id="pic2" name="pic2" onchange="readURL(this,'#show2');" required>
										<img  id="show2" src="#" alt="Image Preview" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="pic3"  class="col-sm-2 control-label">Image 3</label>
									<div class="col-sm-8">
										<input type="file"  id="pic3" name="pic3" onchange="readURL(this,'#show3');" required>
										<img  id="show3" src="#" alt="Image Preview" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="pic3"  class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control"  required></textarea>
									</div>
								</div>
								
								<center>
								<button type="reset" class="btn btn-danger" style="height: 50px; width: 100px; color:white;">Reset</button>
								<button type="submit" class="btn btn-primary" style="height: 50px; width: 100px;" name="submit">Add</button>
								</center>
								
							</form>
						</div>
					</div>
	
</div>


