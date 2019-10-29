<?php 
if (isset($_POST['name'])) {
	
	$name = $_POST['name'];
	$sql = "INSERT INTO category(name) VALUES(?)";
	$data = [$name];
	$id = execuSql($sql,$data);
	if ($id) {
		header('location: index.php?m=product&a=category');
	}
}
?>
<div class="box-header with-border">
  <h3 class="box-title">Category Manager</h3>
</div>
<div class="box-body">
 <form action="" method="POST" role="form">
 	<div class="row">
	 	<div class="col-md-3">
	 		<div class="form-group">
		 		<label for="">Category name</label>
		 		<input type="text" class="form-control" name="name" placeholder="Input Product name">
		 	</div>
		 
		 	
	 	</div>
	 	<?php include 'category-list.php'; ?>
 	</div>
 
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

