<?php 
$dir = dirname(dirname(dirname(dirname(__FILE__))));
$cats = getAll(['table' => 'category']);
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$pro = getById(['table' =>'product','value'=>$id]);
$file = $dir.'/public/uploads/'.$pro['image'];
$image = $pro['image'];
if (isset($_POST['name'])) {
	$cropImage = $_POST['cropImage'];
	if ($cropImage) {
		if ($image = upload_img($cropImage)) {
			if (file_exists($file)) {
				unlink($file);
			}
		}
		
	}
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$category_id = $_POST['category_id'];
	$sale_price = $_POST['sale_price'];
	$content = $_POST['content'];
	$sql = "UPDATE product SET name = '$name', price = '$price', sale_price = '$sale_price', sale_price = '$sale_price', category_id = '$category_id', image = '$image', content = '$content' WHERE id = $id";
	$stm = $conn->prepare($sql);

	if ($stm->execute()) {
		header('location: index.php?m=product');
	}
}


$imgSrc = file_exists($dir.'/public/uploads/'.$pro['image']) ? '..//public/uploads/'.$pro['image'] : 'assets/images/no-ig.png';
?>
<div class="box-header with-border">
  <h3 class="box-title">Add new product</h3>
</div>
<div class="box-body">
 <form action="" method="POST" role="form">
 	<div class="row">
	 	<div class="col-md-9">
	 		<div class="form-group">
		 		<label for="">Product name</label>
		 		<input type="text" class="form-control" name="name" placeholder="Input Product name" value="<?php echo $pro['name'];?>">
		 	</div>
		 	<div class="form-group">
		 		<label>Product Contents</label>
		 		<textarea name="content" id="content" class="form-control" ><?php echo $pro['content'];?></textarea>
		 	</div>
		 	
	 	</div>
	 	<div class="col-md-3">
	 		<div class="form-group">
		 		<label for="">Product Category</label>
		 		<select name="category_id" id="input" class="form-control" required>
		 			<option value="">Select one</option>
		 			<?php foreach($cats as $cat) : $slt = $pro['category_id'] == $cat['id'] ? 'selected' : '' ?>
		 			<option <?= $slt ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
			 		<?php endforeach; ?>
		 		</select>
		 	</div>
	 		
 			<div class="form-group">
		 		<label for="">Product Price</label>
		 		<input type="text" class="form-control" name="price" placeholder="Input Product name" value="<?php echo $pro['price'];?>">
		 	</div>
 	
 			<div class="form-group">
		 		<label for="">Product sale Price</label>
		 		<input type="text" class="form-control" name="sale_price" placeholder="Input Product name" value="<?php echo $pro['sale_price'];?>">
		 	</div>
	 		<input type="hidden" name="cropImage" id="cropImage">
	 		<input type="file" name="image" id="image" style="display: none" data-crop="show_img" data-value="cropImage" data-crop-width="640" data-crop-height="600" accept="image/*">
	 		<div class="thumbnail" id="select_thumb">
	 			<img src="<?php echo $imgSrc;?>" id="show_img">
	 		</div>
	 	</div>
 	</div>
 	
 
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

<?php 
function upload_img($file){
	$dir = dirname(dirname(dirname(dirname(__FILE__))));
	try {
		$imgs = explode('}}}', $file);
		$image_name = time().'-'.$imgs[0];
		$img_data = $imgs[1];
		list($type, $data) = explode(';', $img_data);
		list(, $data)      = explode(',', $data);
		file_put_contents($dir.'/public/uploads/'.$image_name, base64_decode($data));
		return $image_name;
	} catch (Exception $e) {
		return false;
	}
}

?>