<?php 
if (isset($_POST['name'])) {
	
	$name = $_POST['name'];
	$value = $_POST['value'];
	$code = $_POST['code'];
	$sql = "INSERT INTO promotion(name,value,code) VALUES(?,?,?)";
	$data = [$name,$value,$code];
	$id = execuSql($sql,$data);
	if ($id) {
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
		 		<input type="text" class="form-control" readonly name="code" value="<?php echo get_promo();?>">
		 	</div>
	 		<div class="form-group">
		 		<label for="">Promotion name</label>
		 		<input type="text" class="form-control" name="name" placeholder="Input Promotion name">
		 	</div>
		 	
		 	<div class="form-group">
		 		<label for="">Promotion value %</label>
		 		<input type="text" class="form-control" name="value" placeholder="Input Promotion value">
		 	</div>
		 
		 	
	 	</div>
	 	<?php include 'promo-list.php'; ?>
 	</div>
 
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

