<?php 
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$cat = getById(['table' =>'promotion','value'=>$id]);
if (isset($_POST['name'])) {
	
	$name = $_POST['name'];
	$value = $_POST['value'];
	$sql = "UPDATE promotion SET name = '$name',value = '$value' WHERE id = $id";

	$stm = $conn->prepare($sql);
	if ($stm->execute()) {
		header('location: index.php?m=promo');
	}
}
?>
<div class="box-header with-border">
  <h3 class="box-title">Promotion Manager</h3>
</div>
<div class="box-body">
 <form action="" method="POST" role="form">
 	<div class="row">
	 	<div class="col-md-3">
	 		<div class="form-group">
		 		<label for="">Promotion Code</label>
		 		<input type="text" class="form-control" name="code" readonly value="<?php echo $cat['code'];?>">
		 	</div>
	 		<div class="form-group">
		 		<label for="">Promotion name</label>
		 		<input type="text" class="form-control" name="name" placeholder="Input Promotion name" value="<?php echo $cat['name'];?>">
		 	</div>	
		 		
		 	<div class="form-group">
		 		<label for="">Promotion Value</label>
		 		<input type="text" class="form-control" name="value" placeholder="Input Promotion name" value="<?php echo $cat['value'];?>">
		 	</div>	 	
	 	</div>
	 	<?php include 'promo-list.php'; ?>
 	</div>
 
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

