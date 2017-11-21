<?php
	session_start();
	if ( !isset($_SESSION['admin'])){
		echo "<script>window.location.assign('../logout.php')</script>";
	}
	

	include 'template/head.php';
	include 'template/banner.php';
	require_once '../core/db2.php';;
	$divyardb = new DBController();
	$query="select * from category";
	$run=$divyardb->runQuery($query);
	
	
	
	if(!isset($_GET['edit'])){
		
?>
<div class="container" style="background-color: paleturquoise; padding-bottom: 200px;">
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

	<h2 align="center">Add Category</h2>
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
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn btn-success" name="submit">Insert</button>
								</center>
								
							</form>
						</div>
						<h2>Category List</h2>
						<h4>Click for edit or delete category</h4>												
							<table class="table table-striped table-hover table-bordered">
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
											<td align="center"><a href="?edit=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil" style="font-size: 25px;"></span></a></td>
											<td align="center"><a href="?delete=<?php echo $id; ?>"><span class="glyphicon glyphicon-remove-sign" style="font-size: 25px;"></span></a></td>
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
	<h2 align="center">Edit Category</h2>
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
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn btn-success" name="submit">Insert</button>
								</center>
								
							</form>
						</div>
</div>
<?php } ?>

