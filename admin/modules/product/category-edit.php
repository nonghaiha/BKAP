<?php 
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$cat = getById(['table' =>'category','value'=>$id]);
if (isset($_POST['name'])) {
	
	$name = $_POST['name'];
	$sql = "UPDATE category SET name = '$name' WHERE id = $id";

	$stm = $conn->prepare($sql);
	if ($stm->execute()) {
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
		 		<input type="text" class="form-control" name="name" placeholder="Input Product name" value="<?php echo $cat['name'];?>">
		 	</div>		 	
	 	</div>
	 	<?php include 'category-list.php'; ?>
 	</div>
 
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

